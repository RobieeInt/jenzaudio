<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instagram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class InstagramController extends Controller
{
    //index
    public function index() {
        $data = Instagram::orderBy('id', 'desc')->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.instagram.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    //btndelete
                    $btnDelete = '<a href="' . route('admin.instagram.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Delete</a>';

                    return $btnEdit . ' ' . $btnDelete;
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.instagram.index');
    }

    //create
    public function create() {
        return view('admin.instagram.create');
    }

    //store
    public function store(Request $request) {
        $data = $request->except('_token');
        $request->validate([
            'link' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,ico',
        ]);

        // $data['image'] = $request->file('image')->store('assets/instagram', 'public');
            //resize dimension 256x312
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(256, 312);
            // $image_resize->save('storage/assets/instagram/' . $image->hashName());

            //check public path if no folder create
            if (!file_exists(public_path('storage/assets/instagram'))) {
                mkdir(public_path('storage/assets/instagram'), 0777, true);
            }

            $image_resize->save(public_path('storage/assets/instagram/'.$image->hashName()));
            $data['image'] = 'assets/instagram/'. $image->hashName();

        // dd($data);
        Instagram::create($data);
        return redirect()->route('admin.instagram')->with('success', 'Data berhasil ditambahkan');
    }

    //edit
    public function edit($id) {
        $data = Instagram::findOrFail($id);
        return view('admin.instagram.edit', compact('data'));
    }
    //update
    public function update(Request $request, $id) {
        $data = $request->except('_token');
        $request->validate([
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,ico',
            ]);
             //get data old image and delete
            $oldImage = Instagram::findOrFail($id);
            Storage::disk('public')->delete($oldImage->image);
            // if (file_exists(public_path('storage/'.$oldImage->image))) {
            //     unlink(public_path('storage/'.$oldImage->image));
            // }
            //resize dimension 256x312
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(256, 312);
            // $image_resize->save('storage/assets/instagram/' . $image->hashName());

            //check public path if no folder create
            if (!file_exists(public_path('storage/assets/instagram'))) {
                mkdir(public_path('storage/assets/instagram'), 0777, true);
            }

            $image_resize->save(public_path('storage/assets/instagram/'.$image->hashName()));
            $data['image'] = 'assets/instagram/'. $image->hashName();
        }
        Instagram::findOrFail($id)->update($data);
        return redirect()->route('admin.instagram')->with('success', 'Data berhasil diupdate');
    }
    //delete
    public function destroy($id) {
        $data = Instagram::findOrFail($id);
         //get data image and delete
         Storage::disk('public')->delete($data->image);
        // if (file_exists(public_path('storage/'.$data->image))) {
        //     unlink(public_path('storage/'.$data->image));
        // }
        $data->delete();
        return redirect()->route('admin.instagram')->with('success', 'Data berhasil dihapus');
    }

}
