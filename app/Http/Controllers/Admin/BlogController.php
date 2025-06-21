<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::orderBy('status', 'desc')->get();
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
                    $btnEdit = '<a href="' . route('admin.blog.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
                    //btnInactive
                    $btnInactive = '<a href="' . route('admin.blog.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Draft</a>';
                    //btnActive
                    $btnActive = '<a href="' . route('admin.blog.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Publish</a>';
                    //if status 1 show btnInactive else show btnActive
                    if ($data->status == 'publish') {
                        return $btnEdit . ' ' . $btnInactive;
                    } else {
                        return $btnEdit . ' ' . $btnActive;
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data['slug'] = Str::slug($request->title);
        // $data['created_by'] = auth()->user()->id;
        // $data['updated_by'] = auth()->user()->id;
        // dd($data);
        //check public path if no folder create
        if (!file_exists(public_path('storage/assets/blog'))) {
            mkdir(public_path('storage/assets/blog'), 0777, true);
        }

        if ($request->hasFile('image')) {
            // $data['image'] = $request->file('image')->store('assets/blog', 'public');
            //resize dimension 498x480
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(498, 480);
            $image_resize->save('storage/assets/blog/' . $image->hashName());
            $data['image'] = 'assets/blog/'. $image->hashName();
        }
        Blog::create($data);
        return redirect()->route('admin.blog')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $data['slug'] = Str::slug($request->title);
        // $data['created_by'] = auth()->user()->id;
        // $data['updated_by'] = auth()->user()->id;
        // dd($data);
        if ($request->hasFile('image')) {
            //get data old image and delete
            $oldImage = Blog::findOrFail($id);
            Storage::disk('public')->delete($oldImage->image);
            $data['image'] = $request->file('image')->store('assets/blog', 'public');
        }
        Blog::findOrFail($id)->update($data);
        return redirect()->route('admin.blog')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        //set status 'draft' if status 'publish' and set status 'publish' if status 'draft'
        if ($data->status == 'publish') {
            $data->update(['status' => 'draft']);
            $message = 'Judul "' .$data->title.'" Di Draft';
            $alert='success-delete';
        } else {
            $data->update(['status' => 'publish']);
            $message = 'Judul "' .$data->title.'" Di Publish';
            $alert='success';
        }
        return redirect()->route('admin.blog')->with($alert, $message);
    }
}
