@extends('layouts.admin')
@section('header')
    <style>
        td{
            vertical-align: middle !important;
        }
    </style>
@endsection
@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <div class="row">

            <!--Table Head Light Start-->
            <div class="col-lg-6 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">برند</h4>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>نام</th>
                                <th>Slug</th>
                                <th>عکس</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td><img style="max-width: 60px; border-radius: 5px;" src="{{$brand->image->path}}" alt="{{$brand->name}}"></td>
                                    <td>
                                        <a title="ویرایش" class="edit button button-box button-xs button-info" href="{{route('brand.edit',$brand->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                        {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminBrandsController@destroy',$brand->id] , 'class'=>'d-inline']) !!}
                                        <button title="حذف" class="delete button button-box button-xs button-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Table Head Light End-->

        </div>

    </div><!-- Content Body End -->
@endsection
