@extends('layouts.header-footer')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li>بلاگ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section mt-32">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        @foreach($blogs as $blog)
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a href="{{route('blog-details',$blog->id)}}"><img src="{{asset($blog->image->path)}}" alt=""></a>
                                </div>
                                <div class="blog_content">
                                    <h3><a href="{{route('blog-details',$blog->id)}}">{{$blog->header}}</a></h3>
                                    <div class="blog_meta">
                                        <span class="post_date"><i class="fa-calendar fa"></i> {{\Morilog\Jalali\Jalalian::forge($blog->created_at)->format('%A, %d %B %y')}}</span>
                                        <span class="author"><i class="fa fa-user-circle"></i> پست شده توسط: ادمین</span>
                                    </div>
                                    <div class="blog_desc">
                                        <p>{{ \Illuminate\Support\Str::limit($blog->summary, 150, $end='...')}}</p>
                                    </div>
                                    <div class="readmore_button">
                                        <a href="{{route('blog-details',$blog->id)}}">ادامه مطلب</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>جستجو</h3>
                            {!! Form::open(['method'=>'GET' , 'action'=>'userInterfaceController@blogSidebar']) !!}
                            <input placeholder="جستجو..." type="text" name="search">
                            <button type="submit">جستجو</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    @if($blogs->hasPages())
        <!--blog pagination area start-->
        <div class="blog_pagination">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            {{$blogs->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog pagination area end-->
    @endif
@endsection
