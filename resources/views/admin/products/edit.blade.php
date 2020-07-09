@extends('layouts.admin')
@section('header')
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/fileinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/plugins/fileinput-rtl.min.css')}}">
    <style>
        .kv-zoom-body.file-zoom-content.krajee-default{height: 480px;}
        .modal{z-index: 9999;}
    </style>
@endsection
@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">
                {!! Form::model($product,['method'=>'PATCH' , 'action'=>['AdminProductsController@update',$product->id],'files'=>true]) !!}

                <h4 class="title">ویرایش محصول</h4>

                <div class="row">
                    <div class="col-lg-6 col-12 mb-30">
                        {!! Form::text('title' ,null , ['class'=>'form-control','id'=>'title','placeholder'=>'عنوان']) !!}
                    </div>

                    <div class="col-lg-6 col-12 mb-30">
                        {!! Form::text('code' ,null , ['class'=>'form-control','id'=>'code','placeholder'=>'کد']) !!}
                    </div>

                    <div class="col-lg-6 col-12 mb-30">
                        <label for="brand_id">برند :</label>
                        {!! Form::select('brand_id', $brands ,null , ['class'=>'form-control','id'=>'brand_id']) !!}
                    </div>

                    <div class="col-lg-6 offset-lg-6 col-12 mb-30">
                        <label for="category_id">دسته بندی:</label>
                        {!! Form::select('category_id', $childCategories ,null , ['class'=>'form-control','id'=>'category_id']) !!}
                    </div>

                    <div class="col-lg-6 offset-lg-6 col-12 mb-30 row pl-0">
                        <label for="price" class="col-4 align-self-center">قیمت فروش :</label>
                        {!! Form::text('price' ,null , ['class'=>'form-control col-8','id'=>'price','placeholder'=>'قیمت فروش']) !!}
                    </div>

                    <div class="col-lg-6 col-12 mb-30 row pl-0" style="margin-left: 15px;">
                        <label for="discount" class="col-4 align-self-center">میزان تخفیف به درصد :</label>
                        {!! Form::text('discount' ,null , ['class'=>'form-control col-8','id'=>'discount']) !!}
                    </div>

                    <div class="col-lg-6 col-12 mb-30 row pl-0">
                        <label for="discount_expiration" class="col-4 align-self-center">تاریخ انقضا تخفیف :</label>
                        {!! Form::text('discount_expiration' ,null , ['class'=>'form-control col-8 input-date-single','id'=>'discount_expiration']) !!}
                    </div>

                    <div class="col-lg-4 offset-lg-8 col-md-5 offset-md-7 col-12 mb-30 row pl-0">
                        <label for="in_stock" class="col-7 align-self-center mb-0">موجودی در انبار (تعداد) :</label>
                        {!! Form::text('in_stock' ,null , ['class'=>'form-control col-5','id'=>'in_stock']) !!}
                    </div>

                    <div class="col-12 mb-30">
                        <label for="description">توضیحات: </label>
                        {!! Form::textarea('description' ,null , ['class'=>'form-control','id'=>'description']) !!}
                    </div>

                    <div class="col-12 mb-30">
                        <label for="specifications" class="mb-15">مشخصات فنی: </label>
                        @if(count(json_decode($product->specifications))>0)
                            @php $counter=0; @endphp
                            @foreach(json_decode($product->specifications) as $headerText=>$rows)
                                <div class="row">
                                    <div class="col-6 row mb-10">
                                        <label for="" class="col-4 text-center align-self-center">سربرگ</label>
                                        <input type="text" class="col-8 form-control" name="header[]" data-header-count value="{{$headerText}}">
                                    </div>
                                    <div class="col-6 mb-10 align-self-center">
                                        @if($counter==0)
                                            <button class="button button-xs button-success" type="button" onclick="addNewSpecificationsHeader(this)"><i class='fa fa-plus mr-0'></i></button>
                                        @else
                                            <button class='button button-xs button-warning' type='button' onclick='removeSpecificationsHeader(this)'><i class='fa fa-minus mr-0'></i></button>
                                        @endif
                                    </div>
                                    @php $rowCounter=0; @endphp
                                    @foreach($rows as $titleText=>$valueText)
                                        <div class="col-6 row mb-10">
                                            <label for="" class="col-4 text-center align-self-center">عنوان</label>
                                            <input type="text" class="col-8 form-control" name="title_{{$counter}}[]" value="{{$titleText}}">
                                        </div>
                                        <div class="col-6 row mb-10">
                                            <label for="" class="col-4 text-center align-self-center">مقدار</label>
                                            <input type="text" class="col-8 form-control" name="value_{{$counter}}[]" value="{{$valueText}}">
                                            @if($rowCounter ==0)
                                                <button class="button button-xs button-primary" style="position: absolute;left: -20px;top: 10px;" type="button" onclick="addNewSpecificationsRow(this)" data-value-count="{{$counter}}"><i class='fa fa-plus mr-0'></i></button>
                                            @else
                                                <button class='button button-xs button-warning' style='position:absolute;left:-20px;top:10px;' type='button' onclick='removeSpecificationsRow(this)'><i class='fa fa-minus mr-0'></i></button>
                                            @endif
                                        </div>
                                        @php $rowCounter++; @endphp
                                    @endforeach
                                </div>
                                @php $counter++; @endphp
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-6 row mb-10">
                                    <label for="" class="col-4 text-center align-self-center">سربرگ</label>
                                    <input type="text" class="col-8 form-control" name="header[]" data-header-count>
                                </div>
                                <div class="col-6 mb-10 align-self-center">
                                    <button class="button button-xs button-success" type="button" onclick="addNewSpecificationsHeader(this)"><i class='fa fa-plus mr-0'></i></button>
                                </div>
                                <div class="col-6 row mb-10">
                                    <label for="" class="col-4 text-center align-self-center">عنوان</label>
                                    <input type="text" class="col-8 form-control" name="title_0[]">
                                </div>
                                <div class="col-6 row mb-10">
                                    <label for="" class="col-4 text-center align-self-center">مقدار</label>
                                    <input type="text" class="col-8 form-control" name="value_0[]">
                                    <button class="button button-xs button-primary" style="position: absolute;left: -20px;top: 10px;" type="button" onclick="addNewSpecificationsRow(this)" data-value-count="0"><i class='fa fa-plus mr-0'></i></button>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

                <h4 class="title">تصاویر محصول (1000 * 1000)</h4>

                <input type="file" class="file" id="fileinput" name="editedImages[]" multiple>

                @if(count($errors) > 0)
                    <div class="alert alert-danger mt-5" style="text-align: left; direction: ltr;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!-- Button Group Start -->
                <div class="row mt-5">
                    <div class="d-flex flex-wrap justify-content-end col mbn-10">
                        <input type="submit" value="ویرایش" class="button button-primary ml-3">
                        <a href="{{route('product.index')}}" class="button button-danger">انصراف</a>
                    </div>
                </div><!-- Button Group End -->

                {!! Form::close() !!}
            </div>

        </div><!-- Add or Edit Product End -->

    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script src="{{asset('assets/js/plugins/bootstrap-fileinput/piexif.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-fileinput/purify.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-fileinput/fileinput.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-fileinput/theme.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/bootstrap-select/bootstrapSelect.active.js')}}"></script>
    <script src="{{asset('assets/js/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>
    <script src="{{asset('assets/js/plugins/inputmask/bootstrap-inputmask.js')}}"></script>
    <script type="text/javascript">
        $("#fileinput").fileinput({
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            initialPreview: [
                @foreach($product->images as $image)
                    "{{$image->path}}",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($product->images as $indexKey=>$image)
                {caption: "Product Image {{$indexKey+1}}", key: {{$image->id}} },
                @endforeach
            ],
            initialPreviewAsData: true,
            overwriteInitial: false,
            theme: "fa",
            deleteUrl:"/admin/product/delete-product-image",
            deleteExtraData: {_token: "{{csrf_token()}}","product_id":"{{$product->id}}"}
        });

        function addNewSpecificationsHeader(btn) {
            let headerCount = $(btn).parent().parent().parent().find('input[data-header-count]').length;
            let html="<div class='row'>" +
                "<div class='col-6 row mb-10'>" +
                "<label for='' class='col-4 text-center align-self-center'>سربرگ</label>" +
                "<input type='text' class='col-8 form-control' name='header[]' data-header-count>" +
                "</div>" +
                "<div class='col-6 mb-10 align-self-center'>" +
                "<button class='button button-xs button-warning' type='button' onclick='removeSpecificationsHeader(this)'><i class='fa fa-minus mr-0'></i></button>" +
                "</div>" +
                "<div class='col-6 row mb-10'>" +
                "<label for='' class='col-4 text-center align-self-center'>عنوان</label>" +
                "<input type='text' class='col-8 form-control' name='title_"+headerCount+"[]'>" +
                "</div>" +
                "<div class='col-6 row mb-10'>" +
                "<label for='' class='col-4 text-center align-self-center'>مقدار</label>" +
                "<input type='text' class='col-8 form-control' name='value_"+headerCount+"[]'>" +
                "<button class='button button-xs button-primary' style='position:absolute;left:-20px;top:10px;' type='button' onclick='addNewSpecificationsRow(this)' data-value-count='"+headerCount+"'><i class='fa fa-plus mr-0'></i></button>" +
                "</div>" +
                "</div>";
            $(btn).parent().parent().after(html);
        }

        function addNewSpecificationsRow(btn) {
            let counterNumber=parseInt($(btn).attr('data-value-count'));
            let html="<div class='col-6 row mb-10'>" +
                "<label for='' class='col-4 text-center align-self-center'>عنوان</label>" +
                "<input type='text' class='col-8 form-control' name='title_"+counterNumber+"[]'>" +
                "</div>" +
                "<div class='col-6 row mb-10'>" +
                "<label for='' class='col-4 text-center align-self-center'>مقدار</label>" +
                "<input type='text' class='col-8 form-control' name='value_"+counterNumber+"[]'>" +
                "<button class='button button-xs button-warning' style='position:absolute;left:-20px;top:10px;' type='button' onclick='removeSpecificationsRow(this)'><i class='fa fa-minus mr-0'></i></button>" +
                "</div>";
            $(btn).parent().after(html);
        }

        function removeSpecificationsRow(btn) {
            $(btn).parent().prev().remove();
            $(btn).parent().remove();
        }

        function removeSpecificationsHeader(btn) {
            $(btn).parent().parent().remove();
        }
    </script>
@endsection

