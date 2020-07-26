<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CustomClasses\interventionImages;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['search']) ){
            $search = $_GET['search'];
            $products = Product::orderByDesc('id')->where([['title', 'LIKE', '%' . $search . '%']])->simplePaginate(25);
        }else{
            $products = Product::orderByDesc('id')->simplePaginate(25);
        }
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $childCategories=Category::where('has_parent',1)->pluck('name','id');
        $brands=Brand::all()->pluck('name','id');
        return view('admin.products.create',compact('brands','childCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|max:255',
            'brand_id'=>'required|max:255',
            'category_id'=>'required|max:255',
            'price'=>'required|integer',
            'description'=>'required',
            'productImages'=>'required|array',
        ];

        $messages=[

        ];

        $this->validate($request,$rules,$messages);

        $specificationsArray=array();
        foreach ($request['header'] as $indexKey=>$singleHeader){
            $titleAndValueCount=count($request['title_'.$indexKey]);
            $titleAndValueArray=array();
            for ($counter=0;$counter<$titleAndValueCount;$counter++){
                $titleAndValueArray[$request['title_'.$indexKey][$counter]]=$request['value_'.$indexKey][$counter];
            }
            $specificationsArray[$singleHeader]=$titleAndValueArray;
        }

        $input = $request->all();
        $input['specifications']=json_encode($specificationsArray);

        $category=Category::findOrFail($request['category_id']);
        $input['category_name']=$category->name;
        $input['category_slug']=$category->slug;

        $brand=Brand::findOrFail($request['brand_id']);
        $input['brand_name']=$brand->name;
        $input['brand_slug']=$brand->slug;

        if ($request['discount'] > 0){
            $input['discount_expiration'] = date('Y-m-d', strtotime($request['discount_expiration']));
        }else{
            $input['discount_expiration']=null;
        }

        $product = Product::create($input);

        if ($request->hasFile('productImages')){

            $files=$request->file('productImages');

            foreach ($files as $file){
                $name = time() . $file->getClientOriginalName();
                $image=Image::create(['path'=>$name]);
                $product->images()->attach($image);
                $saveImages=new interventionImages();
                $saveImages->store($file,$name,180,220,370);
            }
        }

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $childCategories = Category::where('has_parent',1)->pluck('name','id');
        $brands = Brand::all()->pluck('name','id');
        $product->brand_id=Brand::where('name',$product->brand_name)->first()->id;
        $product->category_id=Category::where('name',$product->category_name)->first()->id;
        if ($product['discount_expiration'] != null){$product['discount_expiration'] = date('m/d/Y', strtotime($product['discount_expiration']));}
        else{$product['discount_expiration'] = date('m/d/Y', strtotime('now'));}

        return view('admin.products.edit',compact('product','childCategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {

        $rules=[
            'title'=>'required|max:255',
            'brand_id'=>'required|max:255',
            'category_id'=>'required|max:255',
            'price'=>'required|integer',
            'description'=>'required'
        ];

        $messages=[

        ];

        $this->validate($request,$rules,$messages);

        $product = Product::findOrFail($id);

        $specificationsArray=array();
        foreach ($request['header'] as $indexKey=>$singleHeader){
            $titleAndValueCount=count($request['title_'.$indexKey]);
            $titleAndValueArray=array();
            for ($counter=0;$counter<$titleAndValueCount;$counter++){
                $titleAndValueArray[$request['title_'.$indexKey][$counter]]=$request['value_'.$indexKey][$counter];
            }
            $specificationsArray[$singleHeader]=$titleAndValueArray;
        }

        $input = $request->all();
        $input['specifications']=json_encode($specificationsArray);

        $category=Category::findOrFail($request['category_id']);
        $input['category_name']=$category->name;
        $input['category_slug']=$category->slug;

        $brand=Brand::findOrFail($request['brand_id']);
        $input['brand_name']=$brand->name;
        $input['brand_slug']=$brand->slug;

        if ($request['discount'] > 0){
            $input['discount_expiration'] = date('Y-m-d', strtotime($request['discount_expiration']));
        }else{
            $input['discount_expiration']=null;
        }

        $product->update($input);

        if ($request->hasFile('editedImages')){

            $files=$request->file('editedImages');

            foreach ($files as $file){

                $name = time() . $file->getClientOriginalName();
                $image=Image::create(['path'=>$name]);
                $product->images()->attach($image);
                $saveImages= new interventionImages();
                $saveImages->store($file,$name,180,220,370);
            }

        }

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach ($product->images as $image){
            $deleteImages = new interventionImages();
            $deleteImages->delete($image);
            $image->delete();
        }

        $product->images()->detach();
        $product->delete();

        return redirect(route('product.index'));
    }

    public function deleteProductImage(Request $request){
        $product=Product::findOrFail($request['product_id']);
        $image=Image::findOrFail($request['key']);
        $deleteImages= new interventionImages();
        $deleteImages->delete($image);
        $product->images()->detach($image->id);
        $image->delete();
        return response()->json([]);
    }
}
