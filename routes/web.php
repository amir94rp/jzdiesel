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

Route::get('/', 'userInterfaceController@index')->name('index');

Route::get('/product/{id}', 'userInterfaceController@productDetails')->name('product-details');

Route::get('/product', 'userInterfaceController@productGrid')->name('product-grid');

Route::post('/product', 'userInterfaceController@asyncFetchProducts')->name('fetch-products-async');

Route::get('/search-result', 'userInterfaceController@searchResult')->name('search-result');

Route::get('/blog/{id}', 'userInterfaceController@blogDetails')->name('blog-details');

Route::get('/blog', 'userInterfaceController@blogSidebar')->name('blog-sidebar');

Route::get('/about-us', function (){return view('about-us');})->name('about-us');

Route::get('/contact-us', function (){return view('contact-us');})->name('contact-us');

Route::post('/contact-us', 'userInterfaceController@contactUsEmail')->name('contact-us-email');

Route::post('/quick-view', 'userInterfaceController@quickView')->name('quick-view');


//admin
Route::get('/admin', function (){return view('admin.index');})->name('admin');

Route::resource('/admin/product', 'AdminProductsController');

Route::post('/admin/product/delete-product-image', 'AdminProductsController@deleteProductImage');

Route::resource('/admin/brand', 'AdminBrandsController');

Route::resource('/admin/category', 'AdminCategoriesController');

Route::resource('/admin/blog', 'AdminBlogsController');

Route::resource('/admin/slider', 'AdminSlidersController');

Route::resource('/admin/banner', 'AdminBannersController');

