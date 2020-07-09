@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">
                {!! Form::model($brand,['method'=>'PATCH' , 'action'=>['AdminBrandsController@update',$brand->id],'files'=>true]) !!}
                <h4 class="title">اضافه کردن برند</h4>

                <div class="row">
                    <div class="col-lg-4 col-12 mb-30">
                        {!! Form::text('name', null , ['class'=>'form-control','id'=>'name','placeholder'=>'نام']) !!}
                    </div>
                    <div class="col-lg-4 col-12 mb-30">
                        {!! Form::text('slug', null , ['class'=>'form-control','id'=>'slug','placeholder'=>'Slug']) !!}
                    </div>

                    <div class="col-lg-4 col-12 mb-20">
                        <h6 class="mb-15">تصویر (100 * 100)</h6>
                        <input class="dropify" type="file" name="image" @if($brand->image) data-default-file="{{$brand->image->path}}" @endif>
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
                        <a href="{{route('brand.index')}}" class="button button-danger">انصراف</a>
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

