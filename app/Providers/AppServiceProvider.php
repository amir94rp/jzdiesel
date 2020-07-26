<?php

namespace App\Providers;

use App\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.default');

        view()->composer(['about-us','search-result','blog-sidebar','blog-details','contact-us','product-details','product-grid','welcome'], function (View $view) {

            $categories = Category::all();
            $view->with(['headerCategories'=>$categories]);
        });
    }
}
