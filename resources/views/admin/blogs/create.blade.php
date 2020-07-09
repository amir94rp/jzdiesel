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

            {!! Form::open(['method'=>'POST' , 'action'=>'AdminBlogsController@store','files'=>true]) !!}
            <div class="form-group row">
                {!! Form::label('header','عنوان:',['class'=>'col-1 align-self-center']) !!}
                {!! Form::text('header', null , ['class'=>'form-control col-4']) !!}
            </div>
            <div class="form-group mt-3 row">
                <label for="summary" class="col-1 align-self-center">خلاصه:</label>
                <textarea name="summary" id="summary" class="form-control col-11"></textarea>
            </div>
            <!--Summernote Start-->
            <div class="box-body" style="margin-top: 15px; margin-bottom: 15px;">
                <textarea class="summernote" name="body" id="body"></textarea>
            </div>
            <!--Summernote End-->
            <div class="row mt-5">
                <div class="col-2 align-self-center">
                    <h6>تصویر اصلی (763*1110)</h6>
                </div>
                <div class="col-4 mb-20">
                    <input class="dropify" type="file" name="image">
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
                {!! Form::submit('انتشار مقاله',['class'=>'btn btn-primary ']) !!}
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

