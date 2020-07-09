@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Add or Edit Product Start -->
        <div class="add-edit-product-wrap">

            <div class="add-edit-product-form">
                {!! Form::model($category,['method'=>'PATCH' , 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

                <h4 class="title">اضافه کردن دسته بندی جدید</h4>

                <div class="row">
                    <div class="col-lg-4 col-12 mb-30">
                        {!! Form::text('name', null , ['class'=>'form-control','id'=>'name','placeholder'=>'نام']) !!}
                    </div>

                    <div class="col-lg-4 col-12 mb-30">
                        {!! Form::text('slug', null , ['class'=>'form-control','id'=>'slug','placeholder'=>'Slug']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-12 mb-30">
                        <label for="has_parent">سطح دسته بندی</label>
                        {!! Form::select('has_parent',['0'=>'والد','1'=>'فرزند'], null , ['class'=>'form-control','id'=>'has_parent']) !!}
                    </div>

                    <div class="col-lg-5 col-12 mb-30 @if(! $category->has_parent) d-none @endif" id="parent_id_div">
                        <label for="parent_id">دسته بندی والد</label>
                        {!! Form::select('parent_id',$selectInputCategories, null , ['class'=>'form-control','id'=>'parent_id']) !!}
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
                        <input type="submit" value="ویرایش" class="button button-primary ml-3">
                        <a href="{{route('category.index')}}" class="button button-danger">انصراف</a>
                    </div>
                </div><!-- Button Group End -->

                {!! Form::close() !!}
            </div>

        </div><!-- Add or Edit Product End -->

    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script>
        $("#has_parent").on('change',function () {
            if($(this).val() === "1"){
                $("#parent_id_div").removeClass('d-none');
            }else{
                $("#parent_id_div").addClass('d-none');
            }
        })
    </script>
@endsection
