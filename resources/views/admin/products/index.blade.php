@extends('layouts.admin')

@section('content')

    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Manage Product List Start -->
            <div class="col-md-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">مدیریت لیست محصولات</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-vertical-middle">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>تصویر</th>
                                    <th>عنوان</th>
                                    <th>برند</th>
                                    <th>دسته بندی</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>موجودی</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{$product->images()->first()->path}}" alt="glasses image" style="border-radius: 5px;" width="60"></td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->brand_name}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td>{{number_format($product->price)}}</td>
                                        <td>{{$product->discount . "%"}}</td>
                                        <td>{{$product->in_stock}}</td>
                                        <td>
                                            <div class="table-action-buttons">
                                                <a title="نمایش" target="_blank" class="view button button-box button-xs button-primary" href=""><i class="zmdi zmdi-more"></i></a>
                                                <a title="ویرایش" class="edit button button-box button-xs button-info" href="{{route('product.edit',$product->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                                {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminProductsController@destroy',$product->id] , 'class'=>'d-inline']) !!}
                                                <button title="حذف" class="delete button button-box button-xs button-danger" type="submit"><i class="zmdi zmdi-delete"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Manage Product List End -->

            <div style="margin: 0 auto;">
                {{$products->render()}}
            </div>
        </div>

    </div><!-- Content Body End -->

@endsection
