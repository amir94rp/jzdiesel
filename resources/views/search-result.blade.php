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
                            <li>نتایج جستجو</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title"></div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip" title="لیست"></button>
                        </div>
                        <div class=" niceselect_option">

                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">مرتب سازی بر اساس میانگین امتیاز</option>
                                    <option value="2">مرتب سازی بر اساس محبوبیت</option>
                                    <option value="3">مرتب سازی بر اساس جدید بودن</option>
                                    <option value="4">مرتب سازی بر اساس قیمت: پایین تا بالا</option>
                                    <option value="5">مرتب سازی بر اساس قیمت: بالا تا پایین</option>
                                    <option value="6">نام محصول: الف</option>
                                </select>
                            </form>


                        </div>
                        <div class="page_amount">
                            <p>نمایش {{$products->firstItem()}}–{{$products->lastItem()}} از {{$products->total()}} نتیجه</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper grid_list">
                        @foreach($products as $product)
                            <div class="col-12 ">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('product-details',$product->id)}}"><img src="{{asset($product->images()->first()->path)}}" alt=""></a>
                                        @if($product->images()->skip(1)->first()->path)
                                            <a class="secondary_img" href="{{route('product-details',$product->id)}}"><img src="{{asset($product->images()->skip(1)->first()->path)}}" alt=""></a>
                                        @endif
                                        @if((int)$product->price != 0)
                                            @if((int)$product->discount != 0 AND \Carbon\Carbon::parse($product->discount_expiration)->gt(\Carbon\Carbon::now()))
                                                <div class="label_product">
                                                    <span class="label_sale">-8%</span>
                                                </div>
                                            @endif
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
                                    <div class="product_content grid_content">
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
                                    <div class="product_content list_content">
                                        <div class="left_caption">
                                            <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                            <h4><a href="{{route('product-details',$product->id)}}">{{ \Illuminate\Support\Str::limit($product->title, 47, $end=' ...')}}</a></h4>
                                            <div class="product_desc">
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است </p>
                                            </div>
                                        </div>
                                        <div class="right_caption">
                                            <div class="text_available">
                                                <p>در دسترس: <span>{{$product->in_stock}} موجود در انبار</span></p>
                                            </div>
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
                                            <div class="cart_links_btn">
                                                <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                            </div>
                                            <div class="action_list_links">
                                                <ul>
                                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            {{$products->render()}}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection

