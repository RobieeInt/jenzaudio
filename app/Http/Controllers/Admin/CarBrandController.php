<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\CompressImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CarBrandController extends Controller
{
    use CompressImage;

    public function index() {
        $data = CarBrand::orderBy('status', 'desc')->orderBy('sort_order', 'asc')->get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.carbrand.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btnInactive = '<a href="' . route('admin.carbrand.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
                    $btnActive = '<a href="' . route('admin.carbrand.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
                    if ($data->status == 1) {
                        return $btnEdit . ' ' . $btnInactive;
                    } else {
                        return $btnEdit . ' ' . $btnActive;
                    }
                })
                ->addColumn('total_package', function ($data) {
                    return $data->packages()->count();
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.carbrand.index');
    }

    public function create() {
        return view('admin.carbrand.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|unique:car_brands,name',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,ico,webp,svg',
            'sort_order' => 'nullable|numeric',
            'status' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name);
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadLogo($request);
        } else {
            unset($data['logo']);
        }

        CarBrand::create($data);

        return redirect()->route('admin.carbrand')->with('success', 'Merk mobil "' . $data['name'] . '" berhasil disimpan');
    }

    public function edit($id) {
        $data = CarBrand::findOrFail($id);
        return view('admin.carbrand.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|unique:car_brands,name,' . $id,
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,ico,webp,svg',
            'sort_order' => 'nullable|numeric',
            'status' => 'required',
        ]);

        $item = CarBrand::findOrFail($id);

        $data = $request->except('_token', '_method');
        $data['slug'] = Str::slug($request->name);
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('logo')) {
            //hapus logo lama
            if ($item->logo && File::exists(public_path($item->logo))) {
                File::delete(public_path($item->logo));
            }

            $data['logo'] = $this->uploadLogo($request);
        } else {
            unset($data['logo']);
        }

        $item->update($data);

        return redirect()->route('admin.carbrand')->with('success', 'Merk mobil "' . $item->name . '" berhasil diperbarui');
    }

    public function destroy($id) {
        $data = CarBrand::findOrFail($id);

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

        return redirect()->route('admin.carbrand')->with($alert, 'Merk mobil "' . $data->name . '" ' . $message);
    }

    //getCarBrand: isi dropdown select2 di form paket
    public function getCarBrand(Request $request) {
        $select_options = '<option value="">Semua Mobil (Universal)</option>';
        $data = CarBrand::active()->get();

        foreach ($data as $value) {
            if ($request->has('id') && $request->id == $value->id) {
                $select_options .= '<option value="' . $value->id . '" selected>' . $value->name . '</option>';
            } else {
                $select_options .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }

        echo json_encode(['list' => $select_options]);
    }

    //uploadLogo: compress + convert webp, simpan ke public/assets/car_brands
    private function uploadLogo(Request $request) {
        $filename = $this->compressToWebp(
            $request->file('logo'),
            public_path('assets/car_brands'),
            400
        );

        return 'assets/car_brands/' . $filename;
    }
}
