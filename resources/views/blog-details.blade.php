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
                            <li><a href="{{route('blog-sidebar')}}">بلاگ</a></li>
                            <li>{{$blog->header}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_details blog_padding mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_details_wrapper">
                        <div class="blog_thumb">
                            <a href="#"><img src="{{$blog->image->path}}" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <h3 class="post_title">{{$blog->header}}</h3>
                            <div class="post_meta">
                                <span><i class="ion-person"></i> پست شده توسط </span>
                                <span><a href="#">ادمین</a></span>
                                <span>|</span>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i> در تاریخ : {{\Morilog\Jalali\Jalalian::forge($blog->created_at)->format('%A, %d %B %y')}}	</span>

                            </div>
                            <div class="post_content">
                                {!! $blog->body !!}
                            </div>
                            <div class="entry_content">
                                <div class="post_meta">
                                </div>

                                <div class="social_sharing">
                                    <h3>این پست رو به اشتراک بگذارید:</h3>
                                    <ul>
                                        <li><a href="#" title="فیس بوک"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title="توییتر"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title="پینترست"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" title="گوگل+"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" title="لینکدین"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="related_posts"></div>
                    </div>
                    <!--blog grid area start-->
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
                        <div class="widget_list widget_post">
                            <h3>پست های اخیر</h3>
                            @foreach($latestBlogs as $blog)
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="{{route('blog-details',$blog->id)}}"><img src="{{asset($blog->image->path)}}" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h3><a href="{{route('blog-details',$blog->id)}}">{{$blog->header}}</a></h3>
                                        <span>{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->format('%B %y')}} </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
@endsection

