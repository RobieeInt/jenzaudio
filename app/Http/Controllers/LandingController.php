<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Instagram;
use App\Models\ProductCategories;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        //get product with galleries and category where deleted_at null
        $products = Product::with(['galleries', 'category'])->where('status', '1')->get();
        //productspopular get 3 items where popular = 1 and with highest star
        $productsPopular = Product::with(['galleries', 'category'])->where('status', '1')->where('popular', '1')->orderBy('star', 'desc')->take(10)->get();
        //instagram
        $instagrams = Instagram::orderBy('id', 'desc')->take(10)->get();
        //$testimoni
        $testimonials = Testimoni::orderBy('id', 'desc')->take(10)->get();
        //$blogs
        $blogs = Blog::orderBy('created_at','desc')->take(6)->get();
        //contact
        $contact = Contact::orderBy('id', 'desc')->first();

        $category = ProductCategories::where('status', 1)
                    ->orderBy('id', 'desc')
                    ->take(10)
                    ->get();

                $categoryfooter = ProductCategories::where('status', 1)
                    ->orderBy('id', 'desc')
                    ->take(10)
                    ->get();

        // dd($productsPopular);
        return view('index', compact('products','productsPopular','instagrams','testimonials','blogs','contact','category','categoryfooter'));
    }

    //quickview
    public function quickview($id) {
        $product = Product::with(['galleries', 'category'])->where('id', $id)->firstOrFail();
        return view('quickview', compact('product'));
    }

    //productdetail
    public function productdetail($slug) {
        $product = Product::with(['galleries', 'category'])->where('slug', $slug)->firstOrFail();
        //get random products
        $randomProducts = Product::with(['galleries', 'category'])->where('status', '1')->inRandomOrder()->take(6)->get();
        // dd($product);
        $contact = Contact::orderBy('id', 'desc')->first();
                        $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('frontend.page.productdetail', compact('product', 'randomProducts','contact', 'categoryfooter'));
    }

    //aboutus
    public function about() {
        // return view('frontend.page.aboutus');
                $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $contact = Contact::orderBy('id', 'desc')->first();
        return view('frontend.page.about', compact('contact', 'categoryfooter'));
    }

    //contactus
    public function contact() {
        //get data contact
        $contact = Contact::orderBy('id', 'desc')->first();        $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        // dd($contact);
        return view('frontend.page.contact', compact('contact', 'categoryfooter'));
    }

    //blogdetail
    public function blogdetail($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        //get random blogs
        $randomBlogs = Blog::inRandomOrder()->take(3)->get();
        // dd($blog);
        $contact = Contact::orderBy('id', 'desc')->first();
        return view('frontend.page.blogdetail', compact('blog', 'randomBlogs','contact'));
    }

    //blog
    public function blog() {
        $blogs = Blog::orderBy('created_at','desc')->paginate(12);
        // dd($blogs);
        $contact = Contact::orderBy('id', 'desc')->first();
                $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('frontend.page.blog', compact('blogs','contact', 'categoryfooter'));
    }
    public function event() {
        $events = blog::orderBy('created_at','desc')->paginate(12);
        // dd($events);
        $contact = Contact::orderBy('id', 'desc')->first();
                $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('frontend.page.event', compact('events','contact', 'categoryfooter'));
    }


    public function categoryDetail($slug) {
        // Ambil data kategori berdasarkan slug
        $category = ProductCategories::where('slug', $slug)->firstOrFail();

        // Ambil semua produk yang punya category_id sesuai kategori tersebut
        // $products = Product::with(['galleries', 'category'])
        //             ->where('category_id', $category->id)
        //             ->get();

        $categoryfooter = ProductCategories::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $products = Product::with(['galleries', 'category'])
            ->where('category_id', $category->id)
            ->paginate(6); // atau berapa item per halaman yang lo mau

        $contact = Contact::orderBy('id', 'desc')->first();

        return view('frontend.page.category', compact('category', 'products', 'categoryfooter', 'contact'));
    }
}
