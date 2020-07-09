<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JZDiesel | Admin</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/favicon/favicon-16x16.png">
    <link rel="manifest" href="vendors/favicon/site.webmanifest">
    <link rel="mask-icon" href="vendors/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="vendors/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="vendors/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/IranSansWebFonts/css/style.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/cryptocurrency-icons.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/plugins.css')}}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    @yield('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body dir="rtl">

<div class="main-wrapper">


    <!-- Header Section Start -->
    <div class="header-section">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">

                <!-- Header Logo (Header Left) Start -->
                <div class="header-logo col-auto">
                    <a href="{{route('index')}}">
                        <img src="{{asset('/assets/images/logo/logo.png')}}" alt="">
                        <img src="{{asset('/assets/images/logo/logo-light.png')}}" class="logo-light" alt="">
                    </a>
                </div><!-- Header Logo (Header Left) End -->

                <!-- Header Right Start -->
                <div class="header-right flex-grow-1 col-auto">
                    <div class="row justify-content-between align-items-center">

                        <!-- Side Header Toggle & Search Start -->
                        <div class="col-auto">
                            <div class="row align-items-center">

                                <!--Side Header Toggle-->
                                <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                <!--Header Search-->
                                <div class="col-auto">

                                    <div class="header-search">

                                        <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                        <div class="header-search-form">
                                            <form action="{{route('product.index')}}" method="get">
                                                <input type="text" name="search" placeholder="Search Here">
                                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                            </form>
                                            <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div><!-- Side Header Toggle & Search End -->

                        <!-- Header Notifications Area Start -->
                        <div class="col-auto">

                            <ul class="header-notification-area">



                                <!--User-->
                                <li class="adomx-dropdown col-auto">
                                    <a class="toggle" href="#">
                                        <span class="user">
                                            <span class="avatar">
                                                <img src="{{asset('/assets/images/avatar/avatar-1.jpg')}}" alt="">
                                                <span class="status"></span>
                                            </span>
                                            <span class="name"></span>
                                        </span>
                                    </a>

                                    <!-- Dropdown -->
                                    <div class="adomx-dropdown-menu dropdown-menu-user">
                                        <div class="head">
                                            <h5 class="name">admin</h5>
                                            <span class="mail">info@jzdiesel.ir</span>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <li><a href=""><i class="zmdi zmdi-lock-open"></i>خروج از حساب</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </li>

                            </ul>

                        </div><!-- Header Notifications Area End -->

                    </div>
                </div><!-- Header Right End -->

            </div>
        </div>
    </div><!-- Header Section End -->
    <!-- Side Header Start -->
    <div class="side-header show">
        <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
        <!-- Side Header Inner Start -->
        <div class="side-header-inner custom-scroll">

            <nav class="side-header-menu" id="side-header-menu">
                <ul>
                    <li><a href="{{route('admin')}}"><i class="ti-home"></i> <span>داشبورد</span></a></li>
                    <li class="has-sub-menu"><a href="#"><i class="fa fa-product-hunt"></i> <span>محصولات</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{route('product.index')}}"><span>نمایش همه</span></a></li>
                            <li><a href="{{route('product.create')}}"><span>اضافه کردن محصول جدید</span></a></li>
                        </ul>
                    </li>
                    <li class="has-sub-menu"><a href="#"><i class="zmdi zmdi-blogger"></i> <span>مقالات</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{route('blog.index')}}"><span>نمایش همه</span></a></li>
                            <li><a href="{{route('blog.create')}}"><span>انتشار مقاله جدید</span></a></li>
                        </ul>
                    </li>
                    <li class="has-sub-menu"><a href="#"><span>برند</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{route('brand.index')}}"><span>نمایش همه</span></a></li>
                            <li><a href="{{route('brand.create')}}"><span>اضافه کردن برند جدید</span></a></li>
                        </ul>
                    </li>
                    <li class="has-sub-menu"><a href="#"><span>دسته بندی</span></a>
                        <ul class="side-header-sub-menu">
                            <li><a href="{{route('category.index')}}"><span>نمایش همه</span></a></li>
                            <li><a href="{{route('category.create')}}"><span>اضافه کردن دسته بندی</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div><!-- Side Header Inner End -->
    </div><!-- Side Header End -->

@yield('content')

<!-- Footer Section Start -->
    <div class="footer-section">
        <div class="container-fluid">

            <div class="footer-copyright text-center">
                <p class="text-body-light">2020 &copy; <a href="{{route('index')}}">JZDiesel</a></p>
            </div>

        </div>
    </div><!-- Footer Section End -->

</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
<script src="{{asset('/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugins JS-->
<script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/tippy4.min.js.js')}}"></script>
<!--Main JS-->
<script src="{{asset('/assets/js/main.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->
@yield('scripts')

</body>

</html>
