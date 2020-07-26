@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">
                {!! Form::model($slider,['method'=>'PATCH' , 'action'=>['AdminSlidersController@update',$slider->id],'files'=>true]) !!}

                <h4 class="title">ویرایش Slider</h4>

                <div class="row">
                    <div class="col-lg-4 col-12 mb-30">{!! Form::text('header_two', null , ['class'=>'form-control','id'=>'header_two','placeholder'=>'سربرگ کوچک (h2)']) !!}</div>
                    <div class="col-lg-4 col-12 mb-30">{!! Form::text('header_one', null , ['class'=>'form-control','id'=>'header_one','placeholder'=>'سربرگ بزرگ (h1)']) !!}</div>
                    <div class="col-lg-4 col-12 mb-30">{!! Form::text('paragraph', null , ['class'=>'form-control','id'=>'paragraph','placeholder'=>'پاراگراف']) !!}</div>
                </div>

                <div class="row">
                    <div class="col-lg-4 offset-lg-1 col-12 mb-20">
                        <h6 class="mb-15">تصویر اصلی (500 * 1110)</h6>
                        <input class="dropify" type="file" name="image" @if($slider->image) data-default-file="{{asset($slider->image->path)}} @endif">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-12 mb-30">
                        <label for="redirection_link">لینک:</label>
                        {!! Form::text('redirection_link', null , ['class'=>'form-control text-left','id'=>'redirection_link','style'=>'direction:ltr;']) !!}
                    </div>
                    <div class="col-lg-2 col-4 mb-30">
                        <label for="active">وضعیت:</label>
                        {!! Form::select('active',[0=>'غیرفعال',1=>'فعال'] ,null , ['class'=>'form-control','id'=>'active']) !!}
                    </div>
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger" style="direction: ltr;text-align: left;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!-- Button Group Start -->
                <div class="row">
                    <div class="d-flex flex-wrap justify-content-end col mbn-10">
                        <input type="submit" value="ویرایش" class="button button-primary ml-3">
                        <a href="{{route('slider.index')}}" class="button button-danger">انصراف</a>
                    </div>
                </div><!-- Button Group End -->

                {!! Form::close() !!}
            </div>

        </div><!-- Add or Edit Product End -->

    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script src="{{asset('/assets/js/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/dropify/dropify.active.js')}}"></script>
@endsection

