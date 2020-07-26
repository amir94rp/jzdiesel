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
                            <li>تماس با ما</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact map start-->
    <div class="contact_map mt-32">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-area">
                        <div id="Map" style="height:250px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact map end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>تماس با ما</h3>
                        <p>مشاوران ما مشتاقانه آماده ی ارائه ی خدمات به شما همراهان گرامی می باشند.<br>
                            مشاوره ی تخصصی قبل از خرید = خرید با کیفیف و مقرون به صرفه</p>
                        <ul>
                            <li><i class="fa fa-address-card-o"></i>آدرس فروشگاه : تهران،سعدی شمالی،جنب مترو دروازه دولت،اول مفتح جنوبی،پلاک ۳۵</li>
                            <li><i class="fa fa-address-card-o"></i>آدرس دفتر مرکزی شرکت : تهران،سعدی شمالی،جنب مترو دروازه دولت،اول مفتح جنوبی،پلاک ۳۷،طبقه دوم،واحد ۷</li>
                            <li><i class="fa fa-address-card-o"></i>آدرس انبار : تهران،خیابان فدائیان اسلام،زیر پل بعثت،گاراژ خلیج فارس</li>
                            <li><i class="fa fa-envelope-o"></i> <a href="#">Info@jzdiesel.ir</a></li>
                            <li><i class="fa fa-phone"></i><a href="tel:0989129219431">0912-921-9431</a> </li>
                            <li><i class="fa fa-phone"></i><a href="tel:02188313854">021-8831-3854</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>با ما در ارتباط باشید</h3>
                        {!! Form::open(['method'=>'POST' , 'action'=>'userInterfaceController@contactUsEmail']) !!}
                        <p>
                            <label> نام شما (لازم)</label>
                            <input name="name" placeholder="نام *" type="text">
                        </p>
                        <p>
                            <label> ایمیل شما (لازم)</label>
                            <input name="email" placeholder="ایمیل *" type="email">
                        </p>
                        <p>
                            <label> موضوع</label>
                            <input name="subject" placeholder="موضوع *" type="text">
                        </p>
                        <div class="contact_textarea">
                            <label> پیام شما</label>
                            <textarea placeholder="پیام *" name="message" class="form-control2"></textarea>
                        </div>

                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                <ul class="mb-0">
                                    <li class="border-top-0 p-0">پیام شما با موفقیت ارسال شد</li>
                                </ul>
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <div class="alert alert-danger" style="direction: ltr;text-align: left;">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li class="border-top-0 p-0">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit"> ارسال</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact area end-->
@endsection

@section('footer')
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>
        var lat            = 35.70247;
        var lon            = 51.42619;
        var zoom           = 18;

        var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
        var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);

        map = new OpenLayers.Map("Map");
        var mapnik         = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);

        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(position));

        map.setCenter(position, zoom);
    </script>
@endsection
