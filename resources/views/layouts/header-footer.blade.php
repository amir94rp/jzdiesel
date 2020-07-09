<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>استر - جزئیات محصول</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user-interface-dependencies/img/favicon.ico')}}">

    <!-- CSS
   ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/bootstrap.min.css')}}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/owl.carousel.min.css')}}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/slick.css')}}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/magnific-popup.css')}}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/font.awesome.css')}}">
    <!--font ionicons css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/ionicons.min.css')}}">
    <!--animate css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/animate.css')}}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/jquery-ui.min.css')}}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/slinky.menu.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('user-interface-dependencies/css/style.css')}}">

    <!--modernizr min js here-->
    <script src="{{asset('user-interface-dependencies/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    @yield('header')

</head>

<body>

<!-- Main Wrapper Start -->
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="welcome_text">
                        <p>به فروشگاه ما خوش آمدید!</p>
                    </div>
                    <div class="top_right">
                        <ul>
                            <li class="currency"><a href="#">تومان ایران<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">تومان ایران</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"><img src="{{asset('user-interface-dependencies/img/logo/language.png')}}" alt="">فارسی<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="{{asset('user-interface-dependencies/img/logo/language.png')}}" alt=""> فارسی</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="کل فروشگاه را اینجا جستجو کنید ..." type="text">
                                <button type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="customer_support">
                        <div class="support_img_icon">
                            <img src="{{asset('user-interface-dependencies/img/icon/icon_phone.png')}}" alt="">
                        </div>
                        <div class="customer_support_text">
                            <p>
                                <span>پشتیبان مشتری</span>
                                <a href="tel:(08)12345789">(08)12345789</a>
                            </p>
                        </div>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">صفحه اصلی</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">صفحه اصلی 1</a></li>
                                    <li><a href="index-2.html">صفحه اصلی 2</a></li>
                                    <li><a href="index-3.html">صفحه اصلی 3</a></li>
                                    <li><a href="index-4.html">صفحه اصلی 4</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">فروشگاه</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">طرح های فروشگاه</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">فروشگاه </a></li>
                                            <li><a href="shop-fullwidth.html">عرض کامل </a> </li>
                                            <li><a href="shop-fullwidth-list.html">لیست کامل عرض </a> </li>
                                            <li><a href="shop-right-sidebar.html">نوار کناری راست </a> </li>
                                            <li><a href="shop-right-sidebar-list.html"> لیست نوار سمت راست </a> </li>
                                            <li><a href="shop-list.html">نمای لیست </a> </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">صفحات دیگر </a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">سبد خرید </a> </li>
                                            <li><a href="wishlist.html">لیست دلخواه </a> </li>
                                            <li><a href="checkout.html">پرداخت </a> </li>
                                            <li><a href="my-account.html">حساب من </a> </li>
                                            <li><a href="404.html">خطای 404 </a> </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">انواع محصول </a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">جزئیات محصول </a> </li>
                                            <li><a href="product-sidebar.html">نوار کناری محصول </a> </li>
                                            <li><a href="product-grouped.html">محصول گروه بندی شده </a> </li>
                                            <li><a href="variable-product.html">متغیر محصول </a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">وبلاگ </a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">وبلاگ </a></li>
                                    <li><a href="blog-details.html">جزئیات وبلاگ </a> </li>
                                    <li><a href="blog-fullwidth.html">تمام عرض وبلاگ </a> </li>
                                    <li><a href="blog-sidebar.html">نوار کناری وبلاگ </a> </li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">صفحات </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">درباره ما </a> </li>
                                    <li><a href="services.html">خدمات </a> </li>
                                    <li><a href="faq.html">خدمات </a> </li>
                                    <li><a href="login.html">وارد شوید </a> </li>
                                    <li><a href="compare.html">مقایسه </a> </li>
                                    <li><a href="privacy-policy.html">حریم خصوصی </a> </li>
                                    <li><a href="coming-soon.html">به زودی</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">حساب من </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">درباره ما </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> با ما تماس بگیرید </a>
                            </li>
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<!--header area start-->
<header class="header_area header_p">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-9">
                    <div class="welcome_text">
                        <p>به فروشگاه ما خوش آمدید!</p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="top_right text-right">
                        <ul>
                            <li class="currency"><a href="#">تومان ایران<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">تومان ایران</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"><img src="{{asset('user-interface-dependencies/img/logo/language.png')}}" alt="">فارسی<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="{{asset('user-interface-dependencies/img/logo/language.png')}}" alt=""> فارسی</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header middel start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('user-interface-dependencies/img/logo/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="کل فروشگاه را اینجا جستجو کنید ..." type="text">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="customer_support">
                            <div class="support_img_icon">
                                <img src="{{asset('user-interface-dependencies/img/icon/icon_phone.png')}}" alt="">
                            </div>
                            <div class="customer_support_text">
                                <p>
                                    <span>پشتیبان مشتری</span>
                                    <a href="tel:(08)12345789">(08)12345789</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header_bottom_container header_position">
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li><a href="index.html">صفحه اصلی<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu">
                                            <li><a href="index.html">صفحه اصلی 1</a></li>
                                            <li><a href="index-2.html">صفحه اصلی 2</a></li>
                                            <li><a href="index-3.html">صفحه اصلی 3</a></li>
                                            <li><a href="index-4.html">صفحه اصلی 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega_items"><a href="shop.html">فروشگاه<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                <li><a href="#">طرح های فروشگاه</a>
                                                    <ul>
                                                        <li><a href="shop-fullwidth.html">عرض کامل</a></li>
                                                        <li><a href="shop-fullwidth-list.html">لیست کامل عرض </a> </li>
                                                        <li><a href="shop-right-sidebar.html">نوار کناری راست </a></li>
                                                        <li><a href="shop-right-sidebar-list.html"> لیست نوار سمت راست </a> </li>
                                                        <li><a href="shop-list.html">نمای لیست </a> </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">صفحات دیگر </a>
                                                    <ul>
                                                        <li><a href="cart.html">سبد خرید </a> </li>
                                                        <li><a href="wishlist.html">لیست دلخواه </a> </li>
                                                        <li><a href="checkout.html">پرداخت </a> </li>
                                                        <li><a href="my-account.html">حساب من </a> </li>
                                                        <li><a href="404.html">خطای 404 </a> </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">انواع محصول </a>
                                                    <ul>
                                                        <li><a href="product-details.html">جزئیات محصول </a> </li>
                                                        <li><a href="product-sidebar.html">نوار کناری محصول </a> </li>
                                                        <li><a href="product-grouped.html">محصول گروه بندی شده </a> </li>
                                                        <li><a href="variable-product.html">متغیر محصول </a> </li>

                                                    </ul>
                                                </li>
                                                <li><a href="#">ابزارهای بتونی</a>
                                                    <ul>
                                                        <li><a href="shop.html">کابل ها و اتصالات</a></li>
                                                        <li><a href="shop-list.html">قرص های گرافیکی</a></li>
                                                        <li><a href="shop-fullwidth.html">چاپگر ، جوهر و تونر</a></li>
                                                        <li><a href="shop-fullwidth-list.html">قرص های مرمت شده</a></li>
                                                        <li><a href="shop-right-sidebar.html">درایوهای نوری</a></li>

                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="banner_static_menu">
                                                <a href="shop.html"><img src="{{asset('user-interface-dependencies/img/bg/banner1.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="blog.html">بلاگ<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="blog-details.html">جزئیات وبلاگ </a> </li>
                                            <li><a href="blog-fullwidth.html">تمام عرض وبلاگ </a> </li>
                                            <li><a href="blog-sidebar.html">نوار کناری وبلاگ </a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">صفحات <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="about.html">درباره ما </a> </li>
                                            <li><a href="services.html">خدمات </a> </li>
                                            <li><a href="faq.html">خدمات </a> </li>
                                            <li><a href="login.html">وارد شوید </a> </li>
                                            <li><a href="compare.html">مقایسه </a> </li>
                                            <li><a href="privacy-policy.html">حریم خصوصی </a> </li>
                                            <li><a href="coming-soon.html">به زودی</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">درباره ما </a> </li>
                                    <li><a href="contact.html"> تماس با ما</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>
<!--header area end-->

@yield('content')

<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="{{asset('user-interface-dependencies/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>پخش و توزیع دیزل ژنراتور</p>
                            <div class="customer_support">
                                <div class="support_img_icon">
                                    <img src="{{asset('user-interface-dependencies/img/icon/hotline.png')}}" alt="">
                                </div>
                                <div class="customer_support_text">
                                    <p>
                                        <span>پشتیبان مشتری</span>
                                        <a href="tel:(08)123456789">(08) 123 456 789</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-7">
                    <div class="widgets_container widgets_subscribe">
                        <h3>برای به روزرسانی در خبرنامه مشترک شوید</h3>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="آدرس ایمیل شما..." />
                                <button id="mc-submit">مشترک شدن</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                        <p>ما هرگز آدرس ایمیل شما را با شخص ثالث به اشتراک نمی گذاریم.</p>
                        <div class="footer_social">
                            <ul>
                                <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a class="youtube" href="#"><i class="ion-social-youtube"></i></a></li>
                                <li><a class="google" href="#"><i class="ion-social-google"></i></a></li>
                                <li><a class="instagram" href="#"><i class="ion-social-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>اطلاعات</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">تحویل</a></li>
                                <li><a href="about.html">درباره ما </a></li>
                                <li><a href="contact.html"> تماس با ما</a></li>
                                <li><a href="#">فروشگاه ها</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">اطلاع قانونی</a></li>
                                <li><a href="#">پرداخت امن</a></li>
                                <li><a href="#">راهنما</a></li>
                                <li><a href="my-account.html"> حساب من </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>کپی رایت &copy; 1399 <a href="#">JZDiesel.</a> تمام حقوق محفوظ است.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->


<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('user-interface-dependencies/img/product/product1.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('user-interface-dependencies/img/product/product2.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('user-interface-dependencies/img/product/product3.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{asset('user-interface-dependencies/img/product/product5.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="user-interface-dependencies/img/product/product1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="user-interface-dependencies/img/product/product2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="user-interface-dependencies/img/product/product3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="user-interface-dependencies/img/product/product5.jpg" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>کیف دستی</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">6409 تومان</span>
                                    <span class="old_price" >8409 تومان</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>اندازه</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>رنگ</h2>
                                        <select class="select_option">
                                            <option selected value="1">بنفش</option>
                                            <option value="1">بنفشه</option>
                                            <option value="1">سیاه</option>
                                            <option value="1">صورتی</option>
                                            <option value="1">نارنجی</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="1" value="1" type="number">
                                            <button type="submit">افزودن به سبد</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>این محصول را به اشتراک بگذارید</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal area end-->

<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{asset('user-interface-dependencies/js/vendor/jquery-3.4.1.min.js')}}"></script>
<!--popper min js-->
<script src="{{asset('user-interface-dependencies/js/popper.js')}}"></script>
<!--bootstrap min js-->
<script src="{{asset('user-interface-dependencies/js/bootstrap.min.js')}}"></script>
<!--owl carousel min js-->
<script src="{{asset('user-interface-dependencies/js/owl.carousel.min.js')}}"></script>
<!--slick min js-->
<script src="{{asset('user-interface-dependencies/js/slick.min.js')}}"></script>
<!--magnific popup min js-->
<script src="{{asset('user-interface-dependencies/js/jquery.magnific-popup.min.js')}}"></script>
<!--jquery countdown min js-->
<script src="{{asset('user-interface-dependencies/js/jquery.countdown.js')}}"></script>
<!--jquery ui min js-->
<script src="{{asset('user-interface-dependencies/js/jquery.ui.js')}}"></script>
<!--jquery elevatezoom min js-->
<script src="{{asset('user-interface-dependencies/js/jquery.elevatezoom.js')}}"></script>
<!--isotope packaged min js-->
<script src="{{asset('user-interface-dependencies/js/isotope.pkgd.min.js')}}"></script>
<!--slinky menu js-->
<script src="{{asset('user-interface-dependencies/js/slinky.menu.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('user-interface-dependencies/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('user-interface-dependencies/js/main.js')}}"></script>



</body>


</html>
