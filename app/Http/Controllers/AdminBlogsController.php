<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CustomClasses\interventionImages;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs =Blog::orderBy('id','desc')->simplePaginate(10);
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'image'=>'required|image',
            'header'=>'required|max:255',
            'summary'=>'required',
            'body'=>'required',
        ];

        $messages=[];

        $this->validate($request,$rules,$messages);

        $input = $request->all();

        if ($file = $request->file('image')){

            $name = time(). $file->getClientOriginalName();
            $image = Image::create(['path'=>$name]);
            $input['image_id']=$image->id;
            $saveImages= new interventionImages();
            $saveImages->store($file,$name,350,330,510);
        }

        Blog::create($input);

        return redirect(route('blog.index'));
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
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('blog'));
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
            'header'=>'required|max:255',
            'summary'=>'required',
            'body'=>'required',
        ];

        $messages=[];
        $this->validate($request,$rules,$messages);

        $blog = Blog::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('image')){

            $deleteImages = new interventionImages();
            $deleteImages->delete($blog->image);
            $blog->image->delete();
            $name = time(). $file->getClientOriginalName();
            $image = Image::create(['path'=>$name]);
            $input['image_id']=$image->id;
            $saveImages= new interventionImages();
            $saveImages->store($file,$name,350,330,510);
        }

        $slug = str_replace ( ' ','-',$request['header']);
        $input['slug']=$slug;
        $blog->update($input);

        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $deleteImages= new interventionImages();
        $deleteImages->delete($blog->image);
        $blog->image->delete();
        $blog->delete();

        return redirect(route('blogs.index'));
    }
}
