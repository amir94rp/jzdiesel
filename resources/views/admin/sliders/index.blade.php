@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>slider</h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row">

            <!--Manage Product List Start-->
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-vertical-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>تصویر</th>
                            <th>سربرگ (فرعی)</th>
                            <th>سربرگ (اصلی)</th>
                            <th>پاراگراف</th>
                            <th>وضعیت</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>#{{$slider->id}}</td>
                                <td><img src="{{$slider->image->path}}" alt="{{$slider->header_one}}" class="product-image" style="max-height: 100px;"></td>
                                <td>{{$slider->header_two}}</td>
                                <td>{{$slider->header_one}}</td>
                                <td>{{$slider->paragraph}}</td>
                                <td>
                                    @if($slider->active)
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-action-buttons">
                                        <a class="edit button button-box button-xs button-info" title="ویرایش" href="{{route('slider.edit',$slider->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                        {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminSlidersController@destroy',$slider->id] , 'class'=>'d-inline']) !!}
                                        <button title="حذف slider" class="delete button button-box button-xs button-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Manage Product List End-->

        </div>

    </div><!-- Content Body End -->
@endsection
