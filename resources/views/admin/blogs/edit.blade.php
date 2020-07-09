@extends('layouts.admin')
@section('header')
    <style>
        .modal-dialog{
            margin-top: 175px;
        }

    </style>
@endsection
@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap col-12">

            {!! Form::model($blog,['method'=>'PATCH' , 'action'=>['AdminBlogsController@update',$blog->id],'files'=>true]) !!}
            <div class="form-group row">
                {!! Form::label('header','عنوان:',['class'=>'col-1 align-self-center']) !!}
                {!! Form::text('header', null , ['class'=>'form-control col-4']) !!}
            </div>
            <div class="form-group mt-3 row">
                <label for="summary" class="col-1 align-self-center">خلاصه:</label>
                {!! Form::textarea('summary', null , ['class'=>'form-control col-11','id'=>'summary']) !!}
            </div>
            <div class="form-group mt-3">
                {!! Form::textarea('body', null , ['class'=>'summernote','id'=>'body','style'=>'margin-top: 15px; margin-bottom: 15px;']) !!}
            </div>
            <div class="row mt-5">
                <div class="col-2 align-self-center">
                    <h6>تصویر اصلی (763*1110)</h6>
                </div>
                <div class="col-4 mb-20">
                    <input class="dropify" type="file" name="image" data-default-file="{{$blog->image->path}}">
                </div>
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger" style="text-align: left;direction: ltr;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mt-3 float-left">
                {!! Form::submit('ویرایش',['class'=>'btn btn-primary ']) !!}
                <a href="{{route('blog.index')}}" class="button button-danger">انصراف</a>
            </div>
            {!! Form::close() !!}


        </div><!-- Add or Edit Product End -->

    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script src="{{asset('/assets/js/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/dropify/dropify.active.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/summernote/summernote.active.js')}}"></script>
@endsection

