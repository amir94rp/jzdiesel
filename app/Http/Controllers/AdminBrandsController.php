<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:255',
            'image'=>'required|image|'
        ]);

        $input=$request->all();

        if ($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::create(['path'=>$name]);
            $input['image_id']=$image->id;
        }

        Brand::Create($input);
        return redirect(route('brand.index'));
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
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit',compact('brand'));
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
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'slug'=>'required|string|max:255'
        ]);

        $brand = Brand::findOrFail($id);
        $input=$request->all();

        if ($file = $request->file('image')){

            if($brand->image){
                if (file_exists(public_path().$brand->image->path)){unlink(public_path().$brand->image->path);}
                $brand->image->delete();
            }

            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::create(['path'=>$name]);
            $input['image_id']=$image->id;
        }

        $brand->update($input);
        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $brand =Brand::findOrFail($id);
        if($brand->image){
            if (file_exists(public_path().$brand->image->path)){unlink(public_path().$brand->image->path);}
            $brand->image->delete();
        }
        $brand->delete();
        return redirect(route('brand.index'));
    }
}
