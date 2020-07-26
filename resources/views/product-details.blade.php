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
                            <li><a href="{{route('product-grid')}}">فروشگاه</a></li>
                            <li><a href="{{route('product-grid')."?category=".$product->category_slug}}">{{$product->category_name}}</a></li>
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
                            @if((int)$product->price != 0)
                                <div class="price_box">
                                    @if((int)$product->discount != 0 AND \Carbon\Carbon::parse($product->discount_expiration)->gt(\Carbon\Carbon::now()))
                                        <span class="old_price">{{number_format($product->price)}} تومان</span>
                                        <span class="current_price">{{number_format($product->price - ($product->price * $product->discount /100))}} تومان</span>
                                    @else
                                        <span class="current_price">{{number_format($product->price)}} تومان</span>
                                    @endif
                                </div>
                            @endif
                            <div class="product_desc">
                                <p>{!! nl2br($product->description) !!}</p>
                            </div>
                            <div class="product_variant quantity">
                                <a href="tel:0989129218431" class="button">تماس با پشتیبان</a>
                            </div>
                            <div class="product_meta">
                                <span>دسته: <a href="{{route('product-grid')."?brand=".$product->brand_slug}}">{{$product->brand_name}}</a> <a href="{{route('product-grid')."?category=".$product->category_slug}}">{{$product->category_name}}</a></span>
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
                                    <p>{!! nl2br($product->description) !!}</p>
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
                        <h2>آخرین محصولات</h2>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
                        @foreach($latestAddedProducts as $product)
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{route('product-details',$product->id)}}"><img src="{{asset($product->images()->first()->path)}}" alt=""></a>
                                    @if($product->images()->skip(1)->first()->path)
                                        <a class="secondary_img" href="{{route('product-details',$product->id)}}"><img src="{{asset($product->images()->skip(1)->first()->path)}}" alt=""></a>
                                    @endif
                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-product-id="{{$product->id}}" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                    <h4><a href="{{route('product-details',$product->id)}}">{{ \Illuminate\Support\Str::limit($product->title, 47, $end=' ...')}}</a></h4>
                                    @if((int)$product->price != 0)
                                        <div class="price_box">
                                            @if((int)$product->discount != 0 AND \Carbon\Carbon::parse($product->discount_expiration)->gt(\Carbon\Carbon::now()))
                                                <span class="old_price">{{number_format($product->price)}} تومان</span>
                                                <span class="current_price">{{number_format($product->price - ($product->price * $product->discount /100))}} تومان</span>
                                            @else
                                                <span class="current_price">{{number_format($product->price)}} تومان</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
@endsection
