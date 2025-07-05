<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index() {
        // return view('admin.categories.index');


        // $users = User::query();
        // $data = ProductCategories::query();
        // order by status desc
        $data = ProductCategories::orderBy('status', 'desc')->get();
        //get datatable
        if (request()->ajax()) {
            // $data = ProductCategories::latest();
            // return DataTables::of($data)->make();
            //get data and add button update and delete in column action
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    // return '
                    // <a href="' . route('admin.categories.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    // <a href="' . route('admin.categories.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>
                    // ';
                    $btnEdit = '<a href="' . route('admin.categories.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    //btnInactive
                    $btnInactive = '<a href="' . route('admin.categories.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
                    //btnActive
                    $btnActive = '<a href="' . route('admin.categories.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
                    //if status 1 show btnInactive else show btnActive
                    if ($data->status == 1) {
                        return $btnEdit . ' ' . $btnInactive;
                    } else {
                        return $btnEdit . ' ' . $btnActive;
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('admin.categories.index');
            // dd($data);
    }


    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|unique:product_categories,name',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,ico,webp,svg',
            'status' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name);

        $filename = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
        $destinationPath = public_path('assets/product_categories');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $request->file('image')->move($destinationPath, $filename);

        $data['image'] = 'assets/product_categories/' . $filename;

        ProductCategories::create($data);

        return redirect()->route('admin.categories')->with('success', 'Kategori "' . $data['name'] . '" berhasil disimpan');
    }

    public function destroy($id) {
        $data = ProductCategories::findOrFail($id);
        // $data->delete();
        //delete image name in folder
        // Storage::disk('public')->delete($data->image);

        //set status 0 if status 1 and set status 1 if status 0
        if ($data->status == 1) {
            $data->update(['status' => 0]);
            $message = 'Berhasil di Nonaktifkan';
            $alert='success-delete';
        } else {
            $data->update(['status' => 1]);
            $message = 'Berhasil di Aktifkan';
            $alert='success';
        }
        return redirect()->route('admin.categories')->with($alert, 'Kategori "' . $data->name . '" ' . $message);
    }

    public function edit($id) {
        $data = ProductCategories::findOrFail($id);
        // dd($data);
        return view('admin.categories.edit', compact('data'));
    }

  public function update(Request $request, $id) {
    $request->validate([
        'name' => 'required|unique:product_categories,name,' . $id,
        'description' => 'required',
        'status' => 'required',
        'image' => 'nullable|image|mimes:png,jpg,jpeg,ico,webp,svg',
    ]);

    $data = $request->all();
    $data['slug'] = Str::slug($request->name);

    $item = ProductCategories::findOrFail($id);

    // Jika ada gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama
        if ($item->image && File::exists(public_path($item->image))) {
            File::delete(public_path($item->image));
        }

        // Generate nama random
        $filename = Str::random(20) . '.' . $request->file('image')->getClientOriginalExtension();
        $destinationPath = public_path('assets/product_categories');

        // Pastikan foldernya ada
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Pindahkan file ke folder publik
        $request->file('image')->move($destinationPath, $filename);
        $data['image'] = 'assets/product_categories/' . $filename;
    } else {
        unset($data['image']);
    }

    $item->update($data);

    return redirect()->route('admin.categories')->with('success', $item->name . ' berhasil diperbarui');
}

    //getCategory
    public function getCategory(Request $request) {
        $select_options = '';
        $data = ProductCategories::where('status', 1)->get();

        //if has id selected value by id
        if ($request->has('id')) {
            $select_options .= '<option value="">Pilih Kategori</option>';
            foreach ($data as $key => $value) {
                if ($request->id == $value->id) {
                    $select_options .= '<option value="' . $value->id . '" selected>' . $value->name . '</option>';
                } else {
                    $select_options .= '<option value="' . $value->id . '">' . $value->name . '</option>';
                }
            }
        } else {
            $select_options .= '<option value="">Pilih Kategori</option>';
            foreach ($data as $key => $value) {
                $select_options .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
        }

        echo json_encode(['list' => $select_options]);
    }
}
