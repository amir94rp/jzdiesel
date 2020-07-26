@extends('layouts.header-footer')
@section('header')
    <script type="text/javascript">
        window.products={!! $products !!};
        window.categories={!! $categories !!};
        window.brands={!! $brands !!};
        window.CSRF_Token="{!! csrf_token() !!}";
        window.asyncFetchProductsUrl="{{route('fetch-products-async') }}";
    </script>
@endsection
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li>فروشگاه</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div id="productGridVue"></div>
    </div>
    <!--shop  area end-->
@endsection
@section('footer')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
