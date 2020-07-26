@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>banner</h3>
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
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>#{{$banner->id}}</td>
                                <td><img src="{{$banner->image->path}}" alt="{{$banner->title}}" class="product-image" style="max-height: 80px;"></td>
                                <td>{{$banner->title}}</td>
                                <td>
                                    @if($banner->active)
                                        <span class="badge badge-success">فعال</span>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-action-buttons">
                                        <a class="edit button button-box button-xs button-info" title="ویرایش" href="{{route('banner.edit',$banner->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                        {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminBannersController@destroy',$banner->id] , 'class'=>'d-inline']) !!}
                                        <button title="حذف banner" class="delete button button-box button-xs button-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
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
