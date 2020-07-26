<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Brand;
use App\Category;
use App\Mail\ContactUsEmail;
use App\Product;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userInterfaceController extends Controller
{
    public function index(){
        $brands=Brand::all();
        $blogs=Blog::orderBy('id','desc')->limit(4)->get();
        $sliders=Slider::orderBy('id','desc')->where('active',1)->limit(3)->get();
        $banners=Banner::orderBy('id','desc')->where('active',1)->limit(3)->get();
        $latestAddedProducts=Product::orderBy('id','desc')->limit(8)->get();
        $categories=Category::orderBy('id','desc')->where('has_parent',1)->limit(10)->get();
        $favoriteCategories=Category::orderBy('id','desc')->where('favorite',1)->get();
        $favoriteCategoriesProducts=[];
        foreach ($favoriteCategories as $favorite){$favoriteCategoriesProducts[$favorite->slug]=Product::where('category_slug',$favorite->slug)->limit(10)->get();}
        return view('welcome',compact('latestAddedProducts','brands','blogs','sliders','banners','categories','favoriteCategories','favoriteCategoriesProducts'));
    }

    public function productDetails($id){
        $product=Product::findOrFail($id);
        $latestAddedProducts=Product::orderBy('id','desc')->limit(8)->get();
        return view('product-details',compact('product','latestAddedProducts'));
    }

    public function blogDetails($id){
        $blog=Blog::findOrFail($id);
        $latestBlogs=Blog::orderBy('id','desc')->limit(4)->get();
        return view('blog-details',compact('blog','latestBlogs'));
    }

    public function blogSidebar(){
        if (isset($_GET['search'])){
            $search=$_GET['search'];
            $blogs=Blog::query()->where('header', 'LIKE', "%{$search}%")->paginate(10);
            $blogs->setPath("blog?search=$search");
        }else{
            $blogs=Blog::orderBy('id','desc')->paginate(10);
        }

        return view('blog-sidebar',compact('blogs'));
    }

    public function productGrid(){
        $categories = Category::where('has_parent',1)->get();
        $brands = Brand::all();

        if (isset($_GET['category']) ) {
            $search = $_GET['category'];
            $products = Product::orderBy('id','DESC')->where('category_slug',$search)->limit(12)->get();
        }else if(isset($_GET['brand']) ) {
            $search = $_GET['brand'];
            $products = Product::orderBy('id','DESC')->where('brand_slug',$search)->limit(12)->get();
        }else{
            $products = Product::orderBy('id','DESC')->limit(12)->get();
        }

        foreach ($products as $product){
            $product['image1Url'] = $product->images()->first()->path;
            $product['image2Url'] = $product->images()->skip(1)->first()->path;
            $product['categoryName'] = $product->category_name;
            $product['productUrl'] = route('product-details',$product->id);
        }

        return view('product-grid',compact('categories','brands','products'));
    }

    public function asyncFetchProducts(){
        $products = Product::orderBy('id','DESC')->get();
        foreach ($products as $product){
            $product['image1Url'] = $product->images()->first()->path;
            $product['image2Url'] = $product->images()->skip(1)->first()->path;
            $product['categoryName'] = $product->category_name;
            $product['productUrl'] = route('product-details',$product->id);
        }
        return response()->json($products);
    }

    public function contactUsEmail(Request $request){

        $rules=[
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|email:rfc',
            'subject'=>'required|string|min:3|max:255',
            'message'=>'required',
        ];

        $messages=[

        ];

        $this->validate($request,$rules,$messages);

        Mail::to("info@jzdiesel.ir")->send(new ContactUsEmail($request));
        $request->session()->flash('message','پیام شما با موفقیت ارسال شد');
        return redirect(route('contact-us'));
    }

    public function searchResult(){
        if (isset($_GET['search'])){
            $search=$_GET['search'];
            $products=Product::query()->where('title', 'LIKE', "%{$search}%")->paginate(4);
            $products->setPath("search-result?search=$search");
        }else{
            $products=Product::orderBy('id','desc')->paginate(4);
        }

        return view('search-result',compact('products'));
    }

    public function quickView(Request $request){
        $product=Product::findOrFail($request['productId']);
        $product['images']=$product->images;
        $product['has_discount']=0;
        if ((int)$product->discount != 0 AND Carbon::parse($product->discount_expiration)->gt(Carbon::now())){$product['has_discount']=1;}
        return response()->json($product);
    }
}
