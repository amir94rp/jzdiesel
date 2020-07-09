<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Product;
use Illuminate\Http\Request;

class userInterfaceController extends Controller
{
    public function productDetails($id){
        $product=Product::findOrFail($id);
        return view('product-details',compact('product'));
    }

    public function blogDetails($id){
        $blog=Blog::findOrFail($id);
        return view('blog-details',compact('blog'));
    }
}
