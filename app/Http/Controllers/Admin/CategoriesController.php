<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

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
        // dd($data);
        $request->validate([
            'name' => 'required|unique:product_categories,name',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,ico',
            'status' => 'required',
        ]);

        //slug from name change space with -
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['image'] = $request->file('image')->store('assets/product_categories', 'public');

        // dd($data);
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
        $data = $request->except('_token');
        // dd($data);
        $request->validate([
            'name' => 'required|unique:product_categories,name,' . $id,
            'description' => 'required',
            // 'image' => 'image|mimes:png,jpg,jpeg,ico',
            'status' => 'required',
        ]);

        //slug from name change space with -
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        // $data['image'] = $request->file('image')->store('assets/product_categories', 'public');
        if ($request->hasFile('image')) {
            //get data old image and delete
            $old_image = ProductCategories::findOrFail($id);
            Storage::disk('public')->delete($old_image->image);
            //upload new image
            $data['image'] = $request->file('image')->store('assets/product_categories', 'public');
        } else {
            unset($data['image']);
        }

        // dd($data);
        $item = ProductCategories::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.categories')->with('success', $item->name . ' Data berhasil diupdate');
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
