<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id','desc')->get();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
            'title'=>'required|string|max:255',
            'image'=>'required|image',
            'redirection_link'=>'required',
            'active'=>'required|integer|max:1',
        ]);

        $input = $request->all();

        if ($request->has('image')){

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::Create(['path'=>$name]);
            $input['image_id'] = $image->id;
        }

        Banner::Create($input);
        return redirect(route('banner.index'));
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
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit',compact('banner'));
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
            'title'=>'required|string|max:255',
            'redirection_link'=>'required',
            'active'=>'required|integer|max:1',
        ]);

        $banner = Banner::findOrFail($id);
        $input = $request->all();

        if ($request->has('image')){

            if ($banner->image){
                if (file_exists(public_path().$banner->image->path)){unlink(public_path().$banner->image->path);}
                $banner->image->delete();
            }

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::Create(['path'=>$name]);
            $input['image_id'] = $image->id;
        }

        $banner->update($input);
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $banner =Banner::findOrFail($id);

        if ($banner->image){
            if (file_exists(public_path().$banner->image->path)){unlink(public_path().$banner->image->path);}
            $banner->image->delete();
        }

        $banner->delete();
        return redirect(route('banner.index'));
    }
}
