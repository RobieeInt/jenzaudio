<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PackageGalleries;
use App\Traits\CompressImage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    use CompressImage;

    public function index() {
        $data = Package::with('carBrand', 'galleries')
            ->orderBy('status', 'desc')
            ->orderBy('sort_order', 'asc')
            ->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.package.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btnInactive = '<a href="' . route('admin.package.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
                    $btnActive = '<a href="' . route('admin.package.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
                    if ($data->status == 1) {
                        return $btnEdit . ' ' . $btnInactive;
                    } else {
                        return $btnEdit . ' ' . $btnActive;
                    }
                })
                ->addColumn('thumbnail', function ($data) {
                    return '<img src="' . $data->thumbnail . '" height="50"/>';
                })
                ->addColumn('brand', function ($data) {
                    return $data->brand_name;
                })
                ->addColumn('harga', function ($data) {
                    if (!$data->price) {
                        return '<span class="badge badge-secondary">Hubungi Kami</span>';
                    }

                    if ($data->has_discount) {
                        return '<del class="text-muted">Rp ' . number_format($data->price, 0, ',', '.') . '</del><br>'
                            . '<strong>Rp ' . number_format($data->final_price, 0, ',', '.') . '</strong> '
                            . '<span class="badge badge-warning">-' . $data->discount_percent . '%</span>';
                    }

                    return 'Rp ' . number_format($data->price, 0, ',', '.');
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'thumbnail', 'harga'])
                ->make(true);
        }
        return view('admin.package.index');
    }

    public function create() {
        $carBrands = CarBrand::active()->get();
        return view('admin.package.create', compact('carBrands'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'car_brand_id' => 'nullable|exists:car_brands,id',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'discount_until' => 'nullable|date',
            'sort_order' => 'nullable|numeric',
            'is_popular' => 'required',
            'status' => 'required',
        ], [
            'discount_price.lt' => 'Harga diskon harus lebih kecil dari harga normal',
        ]);

        $data = $request->except('_token');
        $data['slug'] = $this->generateSlug($request->name);
        $data['car_brand_id'] = $request->car_brand_id ?: null;
        $data['price'] = $request->price ?: null;
        $data['discount_price'] = $request->discount_price ?: null;
        $data['discount_until'] = $request->discount_until ?: null;
        $data['sort_order'] = $request->sort_order ?? 0;

        $package = Package::create($data);

        //lanjut ke halaman edit biar admin langsung bisa upload foto
        return redirect()->route('admin.package.edit', $package->id)
            ->with('success', 'Paket "' . $package->name . '" berhasil disimpan. Sekarang upload fotonya.');
    }

    public function edit($id) {
        $data = Package::with('galleries')->findOrFail($id);
        $carBrands = CarBrand::active()->get();
        return view('admin.package.edit', compact('data', 'carBrands'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'car_brand_id' => 'nullable|exists:car_brands,id',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'discount_until' => 'nullable|date',
            'sort_order' => 'nullable|numeric',
            'is_popular' => 'required',
            'status' => 'required',
        ], [
            'discount_price.lt' => 'Harga diskon harus lebih kecil dari harga normal',
        ]);

        $package = Package::findOrFail($id);

        $data = $request->except('_token', '_method');
        $data['slug'] = $this->generateSlug($request->name, $id);
        $data['car_brand_id'] = $request->car_brand_id ?: null;
        $data['price'] = $request->price ?: null;
        $data['discount_price'] = $request->discount_price ?: null;
        $data['discount_until'] = $request->discount_until ?: null;
        $data['sort_order'] = $request->sort_order ?? 0;

        $package->update($data);

        return redirect()->route('admin.package')->with('success', 'Paket "' . $package->name . '" berhasil diupdate');
    }

    public function destroy($id) {
        $data = Package::findOrFail($id);

        //set status 0 kalau status 1, dan sebaliknya
        if ($data->status == 1) {
            $data->update(['status' => 0]);
            $message = 'Berhasil di Nonaktifkan';
            $alert = 'success-delete';
        } else {
            $data->update(['status' => 1]);
            $message = 'Berhasil di Aktifkan';
            $alert = 'success';
        }

        return redirect()->route('admin.package')->with($alert, 'Paket "' . $data->name . '" ' . $message);
    }

    //uploadImage: terima foto dari dropzone, compress + convert webp, simpan ke package_galleries
    public function uploadImage(Request $request) {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'file' => 'required|image|mimes:png,jpg,jpeg,webp|max:5072',
        ]);

        $imageName = $this->compressToWebp(
            $request->file('file'),
            public_path('storage/assets/package'),
            1400
        );
        $imageNameStore = 'assets/package/' . $imageName;

        //foto pertama otomatis jadi foto utama
        $isDefault = PackageGalleries::where('package_id', $request->package_id)->count() === 0 ? 1 : 0;

        PackageGalleries::create([
            'package_id' => $request->package_id,
            'image' => $imageNameStore,
            'is_default' => $isDefault,
        ]);
    }

    //deleteImage
    public function deleteImage(Request $request) {
        $image = PackageGalleries::where('id', $request->id)->first();

        if (!$image) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $package_id = $image->package_id;
        $wasDefault = $image->is_default;

        $path = public_path('storage/' . $image->image);

        if (file_exists($path)) {
            unlink($path);
        }

        $image->delete();

        //kalau yang dihapus foto utama, promosiin foto sisanya
        if ($wasDefault) {
            $next = PackageGalleries::where('package_id', $package_id)->first();
            if ($next) {
                $next->update(['is_default' => 1]);
            }
        }

        return redirect()
            ->route('admin.package.edit', $package_id)
            ->with('success-delete', 'Foto berhasil dihapus');
    }

    //setDefault
    public function setDefault(Request $request) {
        $image = PackageGalleries::where('id', $request->id)->first();

        if (!$image) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $package_id = $image->package_id;

        PackageGalleries::where('package_id', $package_id)->update(['is_default' => 0]);
        PackageGalleries::where('id', $request->id)->update(['is_default' => 1]);

        return redirect()->route('admin.package.edit', $package_id)
            ->with('success-default', 'Foto berhasil dijadikan foto utama');
    }

    //generateSlug: bikin slug unik, tambah suffix angka kalau udah kepake
    private function generateSlug($name, $ignoreId = null) {
        $base = Str::slug($name);
        $slug = $base;
        $i = 2;

        while (
            Package::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
