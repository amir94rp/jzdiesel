@extends('layouts.header-footer')

@section('content')
    <!--slider area start-->
    <section class="slider_section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slider_area owl-carousel">
                        @foreach($sliders as $slider)
                            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset($slider->image->path)}}">
                                <div class="slider_content">
                                    <h2>{{$slider->header_two}}</h2>
                                    <h1>{{$slider->header_one}}</h1>
                                    <p>{{$slider->paragraph}}</p>
                                    <a href="{{$slider->redirection_link}}">ادامه</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--slider area end-->

    <!--banner area start-->
    <div class="banner_area mb-60">
        <div class="container">
            <div class="row">
                @foreach($banners as $banner)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="{{$banner->redirection_link}}"><img src="{{$banner->image->path}}" alt="{{$banner->title}}"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>محصولات جدید</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="automobiles" role="tabpanel">
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

    <!--featured categories area start-->
    <section class="featured_categories mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>دسته بندی ها</h2>
                    </div>
                    <div class="featured_container">
                        <div class="featured_carousel featured_column4 owl-carousel">
                            @for($counter=0;$counter<=count($categories)/2;$counter++)
                                <div class="single_items">
                                    @if(isset($categories[$counter*2]))
                                        <div class="single_featured">
                                            <div class="featured_thumb">
                                                <a href="#"><img src="{{$categories[$counter*2]->image->path}}" alt=""></a>
                                            </div>
                                            <div class="featured_content">
                                                <h3 class="product_name"><a href="#">{{$categories[$counter*2]->name}}</a></h3>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($categories[$counter*2+1]))
                                        <div class="single_featured">
                                            <div class="featured_thumb">
                                                <a href="#"><img src="{{$categories[$counter*2+1]->image->path}}" alt=""></a>
                                            </div>
                                            <div class="featured_content">
                                                <h3 class="product_name"><a href="#">{{$categories[$counter*2+1]->name}}</a></h3>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--featured categories area end-->

    <!--product area start-->
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>محصولات ویژه</h2>
                        </div>
                        <div class="product_tab_button">
                            <ul class=" nav" role="tablist">
                                @foreach($favoriteCategories as $index=>$favorite)
                                    @if($index==0)
                                        <li>
                                            <a class="active" data-toggle="tab" href="#{{$favorite->slug}}" role="tab" aria-controls="{{$favorite->slug}}" aria-selected="true">{{$favorite->name}}</a>
                                        </li>
                                    @else
                                        <li>
                                            <a data-toggle="tab" href="#{{$favorite->slug}}" role="tab" aria-controls="{{$favorite->slug}}" aria-selected="false">{{$favorite->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_wrapper_inner">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="product_left_area">
                            <div class="single_product">
                                <div class="tab-content product_thumb">
                                    @if((int)$latestAddedProducts[0]->price != 0)
                                        @if((int)$latestAddedProducts[0]->discount != 0 AND \Carbon\Carbon::parse($latestAddedProducts[0]->discount_expiration)->gt(\Carbon\Carbon::now()))
                                            <div class="label_product">
                                                <span class="label_sale">-{{(int)$latestAddedProducts[0]->discount}}%</span>
                                            </div>
                                        @endif
                                    @endif
                                    @php $imageCounter=0; @endphp
                                    @foreach($latestAddedProducts[0]->images as $image)
                                        @if($imageCounter == 0)
                                            <div class="tab-pane fade show active" id="producttab{{$imageCounter+1}}" role="tabpanel">
                                                <a href="{{route('product-details',$latestAddedProducts[0]->id)}}"><img src="{{asset($image->path)}}" alt=""></a>
                                            </div>
                                        @else
                                            <div class="tab-pane fade" id="producttab{{$imageCounter+1}}" role="tabpanel">
                                                <a href="{{route('product-details',$latestAddedProducts[0]->id)}}"><img src="{{asset($image->path)}}" alt=""></a>
                                            </div>
                                        @endif
                                        @php $imageCounter++; @endphp
                                    @endforeach
                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-product-id="{{$latestAddedProducts[0]->id}}" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                    </div>
                                </div>
                                <div class="productnav_btn">
                                    <ul class="nav productnav_column3 owl-carousel" role="tablist">
                                        @php $imageCounter=0; @endphp
                                        @foreach($latestAddedProducts[0]->images as $image)
                                            @if($imageCounter == 0)
                                                <li>
                                                    <a class="nav-link active" data-toggle="tab" href="#producttab{{$imageCounter+1}}" role="tab" aria-controls="producttab{{$imageCounter+1}}" aria-selected="false"><img src="{{asset($image->path)}}" alt=""></a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#producttab{{$imageCounter+1}}" role="tab" aria-controls="producttab{{$imageCounter+1}}" aria-selected="false"><img src="{{asset($image->path)}}" alt=""></a>
                                                </li>
                                            @endif
                                            @php $imageCounter++; @endphp
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                    <h4><a href="{{route('product-details',$latestAddedProducts[0]->id)}}">{{ \Illuminate\Support\Str::limit($latestAddedProducts[0]->title, 47, $end=' ...')}}</a></h4>
                                    <div class="productnav_footer">
                                        @if((int)$latestAddedProducts[0]->price != 0)
                                            <div class="price_box">
                                                @if((int)$latestAddedProducts[0]->discount != 0 AND \Carbon\Carbon::parse($latestAddedProducts[0]->discount_expiration)->gt(\Carbon\Carbon::now()))
                                                    <span class="old_price">{{number_format($latestAddedProducts[0]->price)}} تومان</span>
                                                    <span class="current_price">{{number_format($latestAddedProducts[0]->price - ($latestAddedProducts[0]->price * $latestAddedProducts[0]->discount /100))}} تومان</span>
                                                @else
                                                    <span class="current_price">{{number_format($latestAddedProducts[0]->price)}} تومان</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="product_right_area">
                            <div class="tab-content">
                                @php $counter=0; @endphp
                                @foreach($favoriteCategoriesProducts as $index=>$productArray)
                                    <div class="tab-pane fade @if($counter==0) show active @endif" id="{{$index}}" role="tabpanel">
                                        <div class="product_carousel product_column3 owl-carousel">
                                            @for($forCounter=0;$forCounter < count($productArray)/2 ;$forCounter++)
                                                <div class="product_items">
                                                    @if(isset($productArray[$forCounter*2]))
                                                        <div class="single_product">
                                                            <div class="product_thumb">
                                                                <a class="primary_img" href="{{route('product-details',$productArray[$forCounter*2]->id)}}"><img src="{{asset($productArray[$forCounter*2]->images()->first()->path)}}" alt=""></a>
                                                                @if($productArray[$forCounter*2]->images()->skip(1)->first()->path)
                                                                    <a class="secondary_img" href="{{route('product-details',$productArray[$forCounter*2]->id)}}"><img src="{{asset($productArray[$forCounter*2]->images()->skip(1)->first()->path)}}" alt=""></a>
                                                                @endif
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li class="quick_button"><a href="#" data-product-id="{{$productArray[$forCounter*2]->id}}" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="add_to_cart">
                                                                    <a href="tel:0989129218431" class="button">تماس با پشتیبان</a>
                                                                </div>
                                                            </div>
                                                            <div class="product_content">
                                                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                                                <h4><a href="{{route('product-details',$productArray[$forCounter*2]->id)}}">{{ \Illuminate\Support\Str::limit($productArray[$forCounter*2]->title, 47, $end=' ...')}}</a></h4>
                                                                @if((int)$productArray[$forCounter*2]->price != 0)
                                                                    <div class="price_box">
                                                                        @if((int)$productArray[$forCounter*2]->discount != 0 AND \Carbon\Carbon::parse($productArray[$forCounter*2]->discount_expiration)->gt(\Carbon\Carbon::now()))
                                                                            <span class="old_price">{{number_format($productArray[$forCounter*2]->price)}} تومان</span>
                                                                            <span class="current_price">{{number_format($productArray[$forCounter*2]->price - ($productArray[$forCounter*2]->price * $productArray[$forCounter*2]->discount /100))}} تومان</span>
                                                                        @else
                                                                            <span class="current_price">{{number_format($productArray[$forCounter*2]->price)}} تومان</span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(isset($productArray[$forCounter*2+1]))
                                                        <div class="single_product">
                                                            <div class="product_thumb">
                                                                <a class="primary_img" href="{{route('product-details',$productArray[$forCounter*2+1]->id)}}"><img src="{{asset($productArray[$forCounter*2+1]->images()->first()->path)}}" alt=""></a>
                                                                @if($productArray[$forCounter*2+1]->images()->skip(1)->first()->path)
                                                                    <a class="secondary_img" href="{{route('product-details',$productArray[$forCounter*2+1]->id)}}"><img src="{{asset($productArray[$forCounter*2+1]->images()->skip(1)->first()->path)}}" alt=""></a>
                                                                @endif
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li class="quick_button"><a href="#" data-product-id="{{$productArray[$forCounter*2+1]->id}}" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="add_to_cart">
                                                                    <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                                                </div>
                                                            </div>
                                                            <div class="product_content">
                                                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                                                <h4><a href="{{route('product-details',$productArray[$forCounter*2+1]->id)}}">{{ \Illuminate\Support\Str::limit($productArray[$forCounter*2+1]->title, 47, $end=' ...')}}</a></h4>
                                                                @if((int)$productArray[$forCounter*2+1]->price != 0)
                                                                    <div class="price_box">
                                                                        @if((int)$productArray[$forCounter*2+1]->discount != 0 AND \Carbon\Carbon::parse($productArray[$forCounter*2+1]->discount_expiration)->gt(\Carbon\Carbon::now()))
                                                                            <span class="old_price">{{number_format($productArray[$forCounter*2+1]->price)}} تومان</span>
                                                                            <span class="current_price">{{number_format($productArray[$forCounter*2+1]->price - ($productArray[$forCounter*2+1]->price * $productArray[$forCounter*2+1]->discount /100))}} تومان</span>
                                                                        @else
                                                                            <span class="current_price">{{number_format($productArray[$forCounter*2+1]->price)}} تومان</span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    @php $counter++; @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product area end-->

    <!--blog brand area-->
    <div class="blog_brand_area">
        <!--blog area start-->
        <section class="blog_section mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>از وبلاگ ما </h2>
                        </div>
                        <div class="blog_carousel blog_column2 owl-carousel">
                            @foreach($blogs as $blog)
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="{{route('blog-details',$blog->id)}}"><img src="{{$blog->image->path}}" alt="{{$blog->header}}"></a>
                                    </div>
                                    <div class="blog_content">
                                        <h3><a href="{{route('blog-details',$blog->id)}}">{{ \Illuminate\Support\Str::limit($blog->summary, 150, $end='...')}}</a></h3>
                                        <div class="date_post">
                                            <span>{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->format('%A, %d %B %y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog area end-->
        <!--brand area start-->
        <div class="brand_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand_container owl-carousel">
                            @foreach($brands as $brand)
                                <div class="single_brand">
                                    <a href="#"><img style="max-width: 100px;" src="{{$brand->image->path}}" alt="{{$brand->name}}"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--brand area end-->
    </div>
    <!--blog brand end-->
@endsection
