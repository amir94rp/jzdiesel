@extends('layouts.admin')
@section('header')
    <style>
        .box:not(:first-child){
            margin-top: 25px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <div class="row">
            <!--Table Head Dark Start-->
            <div class="col-lg-6 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">دسته بندی والد</h4>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>نام</th>
                                <th>Slug</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parentCategories as $category)
                                <tr>
                                    <th>{{$category->name}}</th>
                                    <th>{{$category->slug}}</th>
                                    <td><a class="btn btn-primary" href="{{route('category.edit',$category->id)}}">ویرایش</a></td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                                        {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Table Head Dark End-->

            <!--Table Head Dark Start-->
            <div class="col-lg-6 col-12 mb-30">
                @foreach($parentCategories as $singleParentCategory)
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">والد : {{$singleParentCategory->name}}</h4>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>نام</th>
                                    <th>Slug</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($childCategories as $category)
                                    @if($category->parent_id == $singleParentCategory->id)
                                        <tr>
                                            <th>{{$category->name}}</th>
                                            <th>{{$category->slug}}</th>
                                            <td><a class="btn btn-primary" href="{{route('category.edit',$category->id)}}">ویرایش</a></td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                                                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--Table Head Dark End-->
        </div>

    </div><!-- Content Body End -->
@endsection

@section('scripts')

@endsection

