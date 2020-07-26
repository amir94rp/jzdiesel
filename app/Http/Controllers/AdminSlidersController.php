<?php

namespace App\Http\Controllers;

use App\Image;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminSlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'header_one'=>'required|string|max:255',
            'header_two'=>'required|string|max:255',
            'paragraph'=>'required|string|max:255',
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

        Slider::Create($input);
        return redirect(route('slider.index'));
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
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit',compact('slider'));
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
            'header_one'=>'required|string|max:255',
            'header_two'=>'required|string|max:255',
            'paragraph'=>'required|string|max:255',
            'redirection_link'=>'required',
            'active'=>'required|integer|max:1',
        ]);

        $input = $request->all();
        $slider = Slider::findOrFail($id);

        if ($request->has('image')){

            if ($slider->image){
                if (file_exists(public_path().$slider->image->path)){unlink(public_path().$slider->image->path);}
                $slider->image->delete();
            }

            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $image = Image::Create(['path'=>$name]);
            $input['image_id'] = $image->id;
        }

        $slider->update($input);
        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image){
            if (file_exists(public_path().$slider->image->path)){unlink(public_path().$slider->image->path);}
            $slider->image->delete();
        }

        $slider->delete();
        return redirect(route('slider.index'));
    }
}
