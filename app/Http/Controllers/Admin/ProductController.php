<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGalleries;
use App\Models\ProductCategories;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index() {
        $data = Product::orderBy('status', 'desc')->get();
        if (request()->ajax()) {
            // return DataTables::of($data)
            //     ->addColumn('action', function ($data) {
            //         $btnEdit = '<a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-warning btn-sm">Edit</a>';
            //         $btnInactive = '<a href="' . route('admin.product.destroy', $data->id) . '" class="btn btn-danger btn-sm delete">Set Nonaktif</a>';
            //         $btnActive = '<a href="' . route('admin.product.destroy', $data->id) . '" class="btn btn-success btn-sm delete">Set Aktif</a>';
            //         if ($data->status == 1) {
            //             return $btnEdit . ' ' . $btnInactive;
            //         } else {
            //             return $btnEdit . ' ' . $btnActive;
            //         }
            //     })
            //     ->addIndexColumn()
            //     ->rawColumns(['action'])
            //     ->make(true);

            //add column action and add image
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
                ->addColumn('image', function ($data) {
                    // $image = '<img src="' . asset('product/' . $data->image) . '" width="100px">';
                    $btnImage = '<a href="javascript:void(0)" class="btn btn-primary btn-sm image"><i class="fas fa-image"></i></a>';
                    return $btnImage;
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image'])
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
        // $data = $request->except('_token');
        // except token  and file
        $data = $request->except('_token', 'file');
        $request->validate([
            'category_id' => 'required',
            'code' => 'required|unique:products',
            'name' => 'required',
            // 'price' => 'required',
            'description' => 'required',
            // 'short_description' => 'required',
            'star' => 'required',
            'popular' => 'required'
        ]);
        $data['slug'] = Str::slug($request->name);
        $data['status'] = 1;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->file('image')->store('product');
        // }
        Product::insert($data);
        // //get ID product
        // $product = Product::where('code', $request->code)->first();
        // // dd($product->id);
        // //if has file insert image save to productGalleries with $product->id
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     foreach ($images as $image) {
        //         $name = $image->getClientOriginalName();
        //         $image->move(public_path() . '/product/', $name);
        //         $data = [
        //             'product_id' => $product->id,
        //             'image' => $name,
        //             'is_default' => 0,
        //             'status' => 'active',
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ];
        //         ProductGalleries::insert($data);
        //     }
        // }

        return redirect()->route('admin.product')->with('success', 'Data berhasil ditambahkan');
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
        $data = $request->except('_token', '_method');
        $request->validate([
            'category_id' => 'required',
            'code' => 'required|unique:products,code,' . $id,
            'name' => 'required',
            // 'price' => 'required',
            'description' => 'required',
            // 'short_description' => 'required',
            'star' => 'required',
            'popular' => 'required'
        ]);
        $data['slug'] = Str::slug($request->name);
        $data['updated_at'] = now();

        // dd($data);
        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->file('image')->store('product');
        // }
        Product::where('id', $id)->update($data);
        // //get ID product
        // $product = Product::where('code', $request->code)->first();
        // // dd($product->id);
        // //if has file insert image save to productGalleries with $product->id
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     foreach ($images as $image) {
        //         $name = $image->getClientOriginalName();
        //         $image->move(public_path() . '/product/', $name);
        //         $data = [
        //             'product_id' => $product->id,
        //             'image' => $name,
        //             'is_default' => 0,
        //             'status' => 'active',
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ];
        //         ProductGalleries::insert($data);
        //     }
        // }
        return redirect()->route('admin.product')->with('success', 'Data berhasil diupdate');
    }

    // //uploadImage get product_id and store to product_galleries model
    // public function uploadImage(Request $request) {
    //     $image = $request->file('file');
    //     $imageName = rand(). '.'. $image->getClientOriginalExtension();
    //      //resize image
    //     $image_resize = Image::make($image->getRealPath());
    //     //resize dimension 282x295
    //     $image_resize->resize(846, 885);

    //     //check public path if no folder create
    //     if (!file_exists(public_path('storage/assets/product'))) {
    //         mkdir(public_path('storage/assets/product'), 0777, true);
    //     }
    //     //save image
    //     $image_resize->save(public_path('storage/assets/product/'.$imageName));
    //     $imageNameStore = 'assets/product/'.$imageName;


    //     // $image->move(public_path('storage/assets/product'),$imageName);
    //     // $imageNameStore = 'assets/product/'.$imageName;



    //     //imageName store assets/product
    //     // $data['image'] = $request->file('image')->store('assets/product_categories', 'public');
    //     // $imageName = $request->file('image')->store('assets/product', 'public');

    //     //save image name and path to product_galleries with $requies product_id
    //     $data = ['product_id'=>$request->product_id,"image"=>$imageNameStore];
    //     // DB::table("product_galleries")->insertGetId($data);
    //     //insert ProductGalleries::insert($data);
    //     ProductGalleries::create($data);//use eloquent method

    // }

    //uploadImage get product_id and store to product_galleries model
    // public function uploadImage(Request $request) {
    //     $image = $request->file('file');
    //     $imageName = rand(). '.'. $image->getClientOriginalExtension();
    //     // $image->move(public_path('product'),$imageName);
    //     // $data['image'] = $request->file('image')->store('assets/product', 'public');
    //     $image->move(public_path('storage/assets/product'),$imageName);
    //     // $imageNameStore set assets/prodcuct $imageName
    //     $imageNameStore = 'assets/product/'.$imageName;



    //     //imageName store assets/product
    //     // $data['image'] = $request->file('image')->store('assets/product_categories', 'public');
    //     // $imageName = $request->file('image')->store('assets/product', 'public');

    //     //save image name and path to product_galleries with $requies product_id
    //     $data = ['product_id'=>$request->product_id,"image"=>$imageNameStore];
    //     // DB::table("product_galleries")->insertGetId($data);
    //     //insert ProductGalleries::insert($data);
    //     ProductGalleries::create($data);//use eloquent method

    // }

    //uploadImage
    public function uploadImage(Request $request) {
        //file max 3mb
        $request->validate([
            'file' => 'required|image|mimes:png,jpg,jpeg|max:5072',
        ]);
        // dd($request);
        $image = $request->file('file');
        $imageName = rand(). '.'. $image->getClientOriginalExtension();
        // $image->move(public_path('product'),$imageName);
        // $data['image'] = $request->file('image')->store('assets/product', 'public');
        // $image->move(public_path('storage/assets/product'),$imageName);
        // $imageNameStore set assets/prodcuct $imageName
        // $imageNameStore = 'assets/product/'.$imageName;

        //resize image
        $image_resize = Image::make($image->getRealPath());
        //resize dimension 282x295
        $image_resize->resize(846, 885);

        //check public path if no folder create
        if (!file_exists(public_path('storage/assets/product'))) {
            mkdir(public_path('storage/assets/product'), 0777, true);
        }
        //save image
        $image_resize->save(public_path('storage/assets/product/'.$imageName));
        $imageNameStore = 'assets/product/'.$imageName;

        //imageName store assets/product
        // $data['image'] = $request->file('image')->store('assets/product_categories', 'public');
        // $imageName = $request->file('image')->store('assets/product', 'public');

        //save image name and path to product_galleries with $requies product_id
        $data = ['product_id'=>$request->product_id,"image"=>$imageNameStore];
        // DB::table("product_galleries")->insertGetId($data);
        //insert ProductGalleries::insert($data);
        ProductGalleries::create($data);//use eloquent method

    }

    //deleteImage
    public function deleteImage (Request $request){
        //get image name
        $image = ProductGalleries::where('id',$request->id)->first();
        $product_id = $image->product_id;
        //delete image
        unlink(public_path('storage/'.$image->image));
        //delete image from database
        ProductGalleries::where('id',$request->id)->delete();

        //return to product
        return redirect()->route('admin.product.edit',$product_id)->with('success-delete', 'Foto berhasil dihapus');

    }

    //setDefault
    public function setDefault (Request $request){
        //get image name
        $image = ProductGalleries::where('id',$request->id)->first();
        $product_id = $image->product_id;
        //set all image is_default = 0
        ProductGalleries::where('product_id',$product_id)->update(['is_default'=>0]);
        //set image is_default = 1
        ProductGalleries::where('id',$request->id)->update(['is_default'=>1]);

        //return to product
        return redirect()->route('admin.product.edit',$product_id)->with('success-default', 'Foto berhasil dijadikan default');

    }

}
