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
                        <form action="{{route('search-result')}}" method="GET">
                            <div class="search_box">
                                <input placeholder="کل فروشگاه را اینجا جستجو کنید ..." type="text" name="search">
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
                                <a href="tel:0989129219431">0912-921-9431</a>
                            </p>
                        </div>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children">
                                <a href="{{route('index')}}">صفحه اصلی </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">فروشگاه</a>
                                <ul class="sub-menu">
                                    @foreach($headerCategories as $headerParentCategory)
                                        @if((int)$headerParentCategory->has_parent == 0)
                                            <li class="menu-item-has-children">
                                                <a href="#">{{$headerParentCategory->name}}</a>
                                                <ul class="sub-menu">
                                                    @foreach($headerCategories as $headerChildCategory)
                                                        @if((int)$headerChildCategory->has_parent ==1 AND (int)$headerChildCategory->parent_id == $headerParentCategory->id)
                                                            <li><a href="{{route('product-grid')."?category=".$headerChildCategory->slug}}">{{$headerChildCategory->name}} </a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('blog-sidebar')}}">وبلاگ </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('about-us')}}">درباره ما </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('contact-us')}}"> با ما تماس بگیرید </a>
                            </li>
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@jzdiesel.ir</a></span>
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
                        <a href="{{route('index')}}"><img src="{{asset('user-interface-dependencies/img/logo/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container">
                            <form action="{{route('search-result')}}" method="GET">
                                <div class="search_box">
                                    <input placeholder="کل فروشگاه را اینجا جستجو کنید ..." type="text" name="search">
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
                                    <a href="tel:0989129219431">0912-921-9431</a>
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
                                    <li><a href="{{route('index')}}">صفحه اصلی </a> </li>
                                    <li class="mega_items"><a href="{{route('product-grid')}}">فروشگاه<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                @foreach($headerCategories as $headerParentCategory)
                                                    @if((int)$headerParentCategory->has_parent == 0)
                                                        <li><a href="#">{{$headerParentCategory->name}}</a>
                                                            <ul>
                                                                @foreach($headerCategories as $headerChildCategory)
                                                                    @if((int)$headerChildCategory->has_parent ==1 AND (int)$headerChildCategory->parent_id == $headerParentCategory->id)
                                                                        <li><a href="{{route('product-grid')."?category=".$headerChildCategory->slug}}">{{$headerChildCategory->name}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="{{route('blog-sidebar')}}">بلاگ </a> </li>
                                    <li><a href="{{route('about-us')}}">درباره ما </a> </li>
                                    <li><a href="{{route('contact-us')}}"> تماس با ما</a></li>
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
                            <a href="{{route('index')}}"><img src="{{asset('user-interface-dependencies/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>شرکت jzdiesel یا همان دیزل ژنراتور جععرزاده فعالیت خود را به طور رسمی از سال ۱۳۹۸ شروع کرده،و با به همراه داشتن کادری مجرب هم در زمینه ی مشاوره ی خرید و هم در زمینه ی خدمات فنی سعی در همراهی شما عزیزان دارد</p>
                            <div class="customer_support">
                                <div class="support_img_icon">
                                    <img src="{{asset('user-interface-dependencies/img/icon/hotline.png')}}" alt="">
                                </div>
                                <div class="customer_support_text">
                                    <p>
                                        <span>پشتیبان مشتری</span>
                                        <a href="tel:0989129219431">0912-921-9431</a>
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
                                <li><a href="{{route('about-us')}}">درباره ما </a></li>
                                <li><a href="{{route('contact-us')}}"> تماس با ما</a></li>
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
                        <p>کپی رایت &copy; 1399 <a href="{{route('index')}}">JZDiesel.</a> تمام حقوق محفوظ است.</p>
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
                                <div class="tab-content product-details-large" id="modalImageContainer">
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
                                <div class="modal_tab_button" id="modalImageNav">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{asset('user-interface-dependencies/img/product/product1.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{asset('user-interface-dependencies/img/product/product2.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{asset('user-interface-dependencies/img/product/product3.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{asset('user-interface-dependencies/img/product/product5.jpg')}}" alt=""></a>
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
                                <div class="product_variant quantity">
                                    <a href="tel:0989129218431" class="button">تماس با پشتیبان</a>
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
@yield('footer')
<!-- Main JS -->
<script src="{{asset('user-interface-dependencies/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        $('li.quick_button a').on('click',function (event) {
            event.preventDefault();
            let productId=$(this).attr('data-product-id');

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                }
            });

            $.ajax({
                type:'POST',
                url:'{{route('quick-view')}}',
                data:{'productId':productId},
                success:function (product) {

                    //start add images to modal
                    let counter =1;
                    let modalImageContainer=$("#modalImageContainer");
                    modalImageContainer.empty();

                    let modalImageNav=$("#modalImageNav");
                    modalImageNav.empty();
                    let imageNavHtmlHolder="";

                    $.each(product.images , function (indexImage,image) {
                        let imageClass="";
                        if(counter == 1){imageClass="show active"}
                        let imageHtml="<div class='tab-pane fade "+imageClass+"' id='tab"+counter+"' role='tabpane"+counter+"'>" +
                            "<div class='modal_tab_img'>" +
                            "<a href='#'><img src='"+image.path+"' alt=''></a>" +
                            "</div>" +
                            "</div>";
                        modalImageContainer.append(imageHtml);

                        imageClass="";
                        let navHtml="";
                        if(counter == 1){
                            imageClass="active";
                            navHtml +="<ul class='nav product_navactive owl-carousel' role='tablist'>";
                        }
                        navHtml +="<li>" +
                            "<a class='nav-link "+imageClass+"' data-toggle='tab' href='#tab"+counter+"' role='tab' aria-controls='tab"+counter+"' aria-selected='false'><img src='"+image.path+"' alt=''></a>" +
                            "</li>";

                        if(counter == product.images.length){
                            navHtml +="</ul>";
                        }
                        imageNavHtmlHolder += navHtml;
                        counter++;
                    });

                    modalImageNav.append(imageNavHtmlHolder);
                    $('.product_navactive').owlCarousel({
                        autoplay: true,
                        loop: true,
                        nav: true,
                        autoplay: false,
                        autoplayTimeout: 8000,
                        items: 4,
                        dots:false,
                        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                        responsiveClass:true,
                        responsive:{
                            0:{
                                items:1,
                            },
                            250:{
                                items:2,
                            },
                            480:{
                                items:3,
                            },
                            768:{
                                items:4,
                            },

                        }
                    });
                    //end add images to modal

                    //add other info
                    $('div.modal_description p').text(product.description.substr(0,300) + " ...");
                    $('div.modal_title h2').text(product.title);

                    //add price info
                    let modalPriceHtml="";
                    if(product.price != 0){
                        if (product.has_discount != 0){
                            let newPrice=product.price -(product.price*product.discount/100);
                            modalPriceHtml += "<span class='new_price'>"+addCommas(newPrice)+" تومان</span>" +
                                "<span class='old_price' >"+addCommas(product.price)+" تومان</span>";
                        }else{
                            modalPriceHtml += "<span class='new_price'>"+addCommas(product.price)+" تومان</span>";
                        }
                    }
                    $("div.modal_price").empty().append(modalPriceHtml);
                    $("#modal_box").modal('show');
                },
                error:function (product) {

                }
            });
        })
    })
</script>


</body>
</html>
