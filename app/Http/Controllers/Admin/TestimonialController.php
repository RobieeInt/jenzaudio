<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index() {
        $data = Testimoni::orderBy('star', 'desc')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.testimonial.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    //btndelete
                    $btnDelete = '<a href="' . route('admin.testimonial.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Delete</a>';

                    return $btnEdit . ' ' . $btnDelete;
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.testimonial.index');
    }

    public function create() {
        return view('admin.testimonial.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,ico',
            'star' => 'required',
        ]);

        $data['star'] = $request->star;
        $data['status'] = 1;
        $data['image'] = $request->file('image')->store('assets/testimonial', 'public');
        // dd($data);
        Testimoni::create($data);
        return redirect()->route('admin.testimonial')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $data = Testimoni::findOrFail($id);
        return view('admin.testimonial.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = $request->except('_token');
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'star' => 'required',
        ]);
        $data['star'] = $request->star;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,ico',
            ]);
            $data['image'] = $request->file('image')->store('assets/testimonial', 'public');
        }
        Testimoni::findOrFail($id)->update($data);
        return redirect()->route('admin.testimonial')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $data = Testimoni::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.testimonial')->with('success', 'Data berhasil dihapus');
    }
}
