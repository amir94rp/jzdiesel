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
                            <li><a href="shop.html">فروشگاه</a></li>
                            <li><a href="shop.html">ابزارات</a></li>
                            <li>جزئیات محصول</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{$product->images()->first()->path}}" data-zoom-image="{{$product->images()->first()->path}}" alt="big-1">
                            </a>
                        </div>

                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @foreach($product->images as $image)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{$image->path}}" data-zoom-image="{{$image->path}}">
                                            <img src="{{$image->path}}" alt="zo-th-1" />
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="#">

                            <h1>{{$product->title}}</h1>
                            <div class="price_box">
                                <span class="current_price">7000 تومان</span>
                                <span class="old_price">8000 تومان</span>

                            </div>
                            <div class="product_desc">
                                <p>{{nl2br($product->description)}}</p>
                            </div>
                            <div class="product_variant quantity">
                                <a href="tel:09156139501" class="button">تماس با پشتیبان</a>
                            </div>
                            <div class="product_meta">
                                <span>دسته: <a href="#">الکترونیک</a></span>
                            </div>

                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="فیس بوک"><i class="fa fa-facebook"></i> پسندیدن</a></li>
                                <li><a class="twitter" href="#" title="توییتر"><i class="fa fa-twitter"></i> توییت</a></li>
                                <li><a class="pinterest" href="#" title="پینترست"><i class="fa fa-pinterest"></i> ذخیره</a></li>
                                <li><a class="google-plus" href="#" title="گوگل +"><i class="fa fa-google-plus"></i> اشتراک</a></li>
                                <li><a class="linkedin" href="#" title="لینکدین"><i class="fa fa-linkedin"></i> لینکدین</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">توضیحات</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">مشخصات</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{nl2br($product->description)}}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                            @foreach(json_decode($product->specifications) as $headerText=>$rows)
                                                @foreach($rows as $titleText=>$valueText)
                                                    <tr>
                                                        <td class="first_child">{{$titleText}}</td>
                                                        <td>{{$valueText}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>محصولات مرتبط</h2>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product17.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product16.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">دیوار کوپ مجهز به دوربین داخلی</a></h4>
                                <div class="price_box">
                                    <span class="old_price">1800 تومان</span>
                                    <span class="current_price">1800 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product15.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product14.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-8%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">ترانس برق مدرن با ولتاژ بسیار قوی...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">2000 تومان</span>
                                    <span class="current_price">1800 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product13.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product12.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-10%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">ضد یخ فومن شیمی محصول بی نظیر...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">2500 تومان</span>
                                    <span class="current_price">2200 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product11.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product10.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">لوگوی بازتاب جین کالوین کلاین</a></h4>
                                <div class="price_box">
                                    <span class="old_price">1500 تومان</span>
                                    <span class="current_price">1200 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product9.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product8.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-12%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">عایق مقاوم در برابر آب و باد و طوفان</a></h4>
                                <div class="price_box">
                                    <span class="old_price">3000 تومان</span>
                                    <span class="current_price">2500 تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product7.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="user-interface-dependencies/img/product/product6.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="افزودن به علاقه مندیها"><i class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="مقایسه"><i class="icon-repeat"></i></a></li>                     <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="افزودن به سبد">افزودن به سبد</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a href="product-details.html">دیوار کوپ مجهز به دوربین داخلی</a></h4>
                                <div class="price_box">
                                    <span class="old_price">2000 تومان</span>
                                    <span class="current_price">1500 تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
@endsection
