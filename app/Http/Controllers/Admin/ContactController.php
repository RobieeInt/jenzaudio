<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index() {
        $data = Contact::orderBy('id', 'desc')->get();
        //get datatable
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $btnEdit = '<a href="' . route('admin.contact.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    $btnInactive = '<a href="' . route('admin.contact.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
                    $btnActive = '<a href="' . route('admin.contact.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
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
        return view('admin.contact.index');
    }

    public function create() {
        return view('admin.contact.create');
    }

    public function store(Request $request) {
        $data = $request->except('_token');
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'linkvideo' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        //resize dimension 598x633
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(598, 633);
            // $image_resize->save('storage/assets/contact/' . $image->hashName());

            //check public path if no folder create
            if (!file_exists(public_path('storage/assets/contact'))) {
                mkdir(public_path('storage/assets/contact'), 0777, true);
            }

            $image_resize->save(public_path('storage/assets/contact/'.$image->hashName()));
            $data['image'] = 'assets/contact/'. $image->hashName();
        }

        // dd($data);
        Contact::create($data);
        return redirect()->route('admin.contact')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $data = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = $request->except('_token');
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'linkvideo' => 'required|string',
        ]);

        //resize dimension 598x633
        if ($request->hasFile('image')) {
             //get data old image and delete
            $oldImage = Contact::findOrFail($id);
            Storage::disk('public')->delete($oldImage->image);
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(598, 633);
            // $image_resize->save('storage/assets/contact/' . $image->hashName());

            //check public path if no folder create
            if (!file_exists(public_path('storage/assets/contact'))) {
                mkdir(public_path('storage/assets/contact'), 0777, true);
            }

            $image_resize->save(public_path('storage/assets/contact/'.$image->hashName()));
            $data['image'] = 'assets/contact/'. $image->hashName();
        }

        Contact::findOrFail($id)->update($data);
        return redirect()->route('admin.contact')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $data = Contact::findOrFail($id);
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
        return redirect()->route('admin.contact')->with($alert, 'Kategori "' . $data->name . '" ' . $message);
    }
}
