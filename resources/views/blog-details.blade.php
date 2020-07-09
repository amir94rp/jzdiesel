@extends('layouts.header-footer')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">صفحه اصلی</a></li>
                            <li><a href="#">مدلینگ</a></li>
                            <li>جزئیات بلاگ</li>
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
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>  در تاریخ بهمن 1398	</span>

                            </div>
                            <div class="post_content">
                                {!! $blog->body !!}
                            </div>
                            <div class="entry_content">
                                <div class="post_meta">
                                    <span>برچسب ها: </span>
                                    <span><a href="#">, دیزل ژنراتور</a></span>
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
                        <div class="related_posts">
                            <h3>پست های مرتبط</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <img src="assets/img/blog/blog3.jpg" alt="">
                                        </div>
                                        <div class="related_content">
                                            <h3><a href="#">ارسال با گالری</a></h3>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> بهمن 1398 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <img src="assets/img/blog/blog4.jpg" alt="">
                                        </div>
                                        <div class="related_content">
                                            <h3><a href="#">ارسال با صوتی</a></h3>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> بهمن 1398 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related column_3">
                                        <div class="related_thumb">
                                            <img src="assets/img/blog/blog5.jpg" alt="">
                                        </div>
                                        <div class="related_content">
                                            <h3><a href="#">ارسال با فیلم</a></h3>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> بهمن 1398 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>جستجو</h3>
                            <form action="#">
                                <input placeholder="جستجو..." type="text">
                                <button type="submit">جستجو</button>
                            </form>
                        </div>
                        <div class="widget_list widget_post">
                            <h3>پست های اخیر</h3>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog12.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog-details.html">پست تصویری وبلاگ</a></h3>
                                    <span>بهمن 1398 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog13.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog-details.html">ارسال با گالری</a></h3>
                                    <span>بهمن 1398 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog14.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog-details.html">ارسال با صدا</a></h3>
                                    <span>بهمن 1398 </span>
                                </div>
                            </div>
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog15.jpg" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="blog-details.html">ارسال با فیلم</a></h3>
                                    <span>بهمن 1398 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
@endsection

