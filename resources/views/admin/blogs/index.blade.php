@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>مقالات <span>/ نمایش همه</span></h3>
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
                            <th>سربرگ</th>
                            <th>خلاصه</th>
                            <th>تاریخ انتشار</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>#{{$blog->id}}</td>
                                <td><img src="{{$blog->image->path}}" alt="{{$blog->header}}" class="product-image" style="max-height: 100px;"></td>
                                <td>{{$blog->header}}</td>
                                <td style="white-space: normal;">{{ \Illuminate\Support\Str::limit($blog->summary, 150, $end='...')}}</td>
                                <td style="direction: ltr;">{{$blog->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="table-action-buttons">
                                        <a class="view button button-box button-xs button-primary" title="نمایش" target="_blank" href=""><i class="zmdi zmdi-more"></i></a>
                                        <a class="edit button button-box button-xs button-info" title="ویرایش" href="{{route('blog.edit',$blog->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                        {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminBlogsController@destroy',$blog->id] , 'class'=>'d-inline']) !!}
                                        <button title="حذف مقاله" class="delete button button-box button-xs button-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
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


            <div style="margin: 0 auto;">
                {{$blogs->render()}}
            </div>
        </div>

    </div><!-- Content Body End -->
@endsection
