<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('index');

Route::get('/product/{id}', 'userInterfaceController@productDetails')->name('product-details');

Route::get('/blog/{id}', 'userInterfaceController@blogDetails')->name('blog-details');


//admin
Route::get('/admin', function (){return view('admin.index');})->name('admin');

Route::resource('/admin/product', 'AdminProductsController');

Route::post('/admin/product/delete-product-image', 'AdminProductsController@deleteProductImage');

Route::resource('/admin/brand', 'AdminBrandsController');

Route::resource('/admin/category', 'AdminCategoriesController');

Route::resource('/admin/blog', 'AdminBlogsController');

