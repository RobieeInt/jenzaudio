<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGalleries;
use App\Models\ProductCategories;
use App\Traits\CompressImage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use CompressImage;

    public function index() {
        $data = Product::with('galleries', 'category')->orderBy('created_at', 'desc')->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btnInactive = '<a href="' . route('admin.product.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
                    $btnActive = '<a href="' . route('admin.product.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
                    if ($data->status == 1) {
                        return $btnEdit . ' ' . $btnInactive;
                    } else {
                        return $btnEdit . ' ' . $btnActive;
                    }
                })
                ->addColumn('thumbnail', function ($data) {
                    //foto diurus di halaman edit, di sini cukup nampilin + jumlahnya
                    $total = $data->galleries->count();
                    $badge = $total
                        ? '<span class="badge badge-secondary">' . $total . ' foto</span>'
                        : '<a href="' . route('admin.product.edit', $data->id) . '" class="badge badge-warning">Belum ada foto</a>';

                    return '<img src="' . $data->thumbnail . '" height="50"/><br>' . $badge;
                })
                ->addColumn('kategori', function ($data) {
                    return $data->category->name ?? '-';
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'thumbnail'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    public function create() {
        //get category
        $categories = ProductCategories::where('status', 1)->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'code' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'star' => 'required',
            'popular' => 'required'
        ]);

        $data = $request->except('_token', 'file');
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->status ?? 1;

        $product = Product::create($data);

        //lanjut ke halaman edit biar admin langsung bisa upload foto
        return redirect()->route('admin.product.edit', $product->id)
            ->with('success', 'Produk "' . $product->name . '" berhasil disimpan. Sekarang upload fotonya.');
    }

    public function edit($id) {
        // $data = Product::findOrFail($id);
        // get data product and relation with productGalleries
        $data = Product::with('galleries')->findOrFail($id);
        $categories = ProductCategories::where('status', 1)->get();
        // dd($data);
        return view('admin.product.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'category_id' => 'required',
            'code' => 'required|unique:products,code,' . $id,
            'name' => 'required',
            'description' => 'required',
            'star' => 'required',
            'popular' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $data = $request->except('_token', '_method');
        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect()->route('admin.product')->with('success', 'Produk "' . $product->name . '" berhasil diupdate');
    }

    //uploadImage: terima foto dari dropzone, compress + convert webp, simpan ke product_galleries
    public function uploadImage(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'file' => 'required|image|mimes:png,jpg,jpeg,webp|max:5072',
        ]);

        $imageName = $this->compressToWebp(
            $request->file('file'),
            public_path('storage/assets/product'),
            1200
        );
        $imageNameStore = 'assets/product/' . $imageName;

        //foto pertama otomatis jadi foto utama
        $isDefault = ProductGalleries::where('product_id', $request->product_id)->count() === 0 ? 1 : 0;

        ProductGalleries::create([
            'product_id' => $request->product_id,
            'image' => $imageNameStore,
            'is_default' => $isDefault,
        ]);
    }

    //deleteImage
    public function deleteImage(Request $request) {
        $image = ProductGalleries::where('id', $request->id)->first();

        if (!$image) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $product_id = $image->product_id;
        $wasDefault = $image->is_default;

        $path = public_path('storage/' . $image->image);

        if (file_exists($path)) {
            unlink($path);
        }

        $image->delete();

        //kalau yang dihapus foto utama, promosiin foto sisanya
        if ($wasDefault) {
            $next = ProductGalleries::where('product_id', $product_id)->first();
            if ($next) {
                $next->update(['is_default' => 1]);
            }
        }

        return redirect()
            ->route('admin.product.edit', $product_id)
            ->with('success-delete', 'Foto berhasil dihapus');
    }

    //setDefault
    public function setDefault(Request $request) {
        $image = ProductGalleries::where('id', $request->id)->first();

        if (!$image) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $product_id = $image->product_id;

        ProductGalleries::where('product_id', $product_id)->update(['is_default' => 0]);
        ProductGalleries::where('id', $request->id)->update(['is_default' => 1]);

        return redirect()->route('admin.product.edit', $product_id)
            ->with('success-default', 'Foto berhasil dijadikan foto utama');
    }
}
