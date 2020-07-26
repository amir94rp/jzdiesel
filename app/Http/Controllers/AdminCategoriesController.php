<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $parentCategories = Category::where('has_parent',0)->orderBy('id','desc')->get();
        $childCategories = Category::where('has_parent',1)->orderBy('id','desc')->get();
        return view('admin.categories.index', compact('parentCategories','childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories=Category::where('has_parent',0)->pluck('name','id');
        return view('admin.categories.create',compact('categories'));
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
            'slug'=>'required|string|max:255'
        ]);

        $input = $request->all();

        if ($request->has('image')){

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::Create(['path'=>$name]);
            $input['image_id'] = $image->id;
        }

        Category::Create($input);
        return redirect(route('category.index'));
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
        $category = Category::findOrFail($id);
        $selectInputCategories=Category::where('has_parent',0)->pluck('name','id');
        return view('admin.categories.edit',compact('category','selectInputCategories'));
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

        $input = $request->all();
        $category = Category::findOrFail($id);

        if ($request->has('image')){

            if ($category->image){
                if (file_exists(public_path().$category->image->path)){unlink(public_path().$category->image->path);}
                $category->image->delete();
            }

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::Create(['path'=>$name]);
            $input['image_id'] = $image->id;
        }

        $category->update($input);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image){
            if (file_exists(public_path().$category->image->path)){unlink(public_path().$category->image->path);}
            $category->image->delete();
        }

        $category->delete();
        return redirect(route('category.index'));
    }
}
