@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap">

            <div class="add-edit-product-form">
                {!! Form::open(['method'=>'POST' , 'action'=>'AdminCategoriesController@store','files'=>true]) !!}

                <h4 class="title">اضافه کردن دسته بندی جدید</h4>

                <div class="row">
                    <div class="col-lg-4 col-12 mb-30">
                        <input type="text" id="name" name="name" class="form-control" placeholder="نام">
                    </div>

                    <div class="col-lg-4 col-12 mb-30">
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-12 mb-30">
                        <label for="has_parent">سطح دسته بندی</label>
                        <select name="has_parent" id="has_parent" class="form-control">
                            <option value="0">والد</option>
                            <option value="1">فرزند</option>
                        </select>
                    </div>

                    <div class="col-lg-5 col-12 mb-30 d-none" id="parent_id_div">
                        <label for="parent_id">دسته بندی والد</label>
                        {!! Form::select('parent_id',$categories, null , ['class'=>'form-control','id'=>'parent_id']) !!}
                    </div>
                </div>

                <div class="row d-none" id="child_info_div">
                    <div class="col-lg-4 offset-lg-8 col-12 mb-20">
                        <h6 class="mb-15">تصویر (120 * 120)</h6>
                        <input class="dropify" type="file" name="image">
                    </div>

                    <div class="col-lg-4 offset-lg-8 col-12 mb-20">
                        <label for="favorite">نمایش در صفحه اصلی</label>
                        <select name="favorite" id="favorite" class="form-control">
                            <option value="0">خیر</option>
                            <option value="1">بله</option>
                        </select>
                    </div>
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger" style="direction: ltr;text-align: left;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <!-- Button Group Start -->
                <div class="row">
                    <div class="d-flex flex-wrap justify-content-start col mbn-10">
                        <input type="submit" value="ثبت" class="button button-primary ml-3">
                        <a href="{{route('category.index')}}" class="button button-danger">انصراف</a>
                    </div>
                </div><!-- Button Group End -->

                {!! Form::close() !!}
            </div>

        </div><!-- Add or Edit Product End -->

    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script src="{{asset('/assets/js/plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/dropify/dropify.active.js')}}"></script>
    <script>
        $("#has_parent").on('change',function () {
            if($(this).val() === "1"){
                $("#parent_id_div").removeClass('d-none');
                $("#child_info_div").removeClass('d-none');
            }else{
                $("#parent_id_div").addClass('d-none');
                $("#child_info_div").addClass('d-none');
            }
        })
    </script>
@endsection
