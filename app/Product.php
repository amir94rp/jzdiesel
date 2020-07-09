<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title',
        'code',
        'brand_name',
        'brand_slug',
        'category_name',
        'category_slug',
        'price',
        'discount',
        'discount_expiration',
        'description',
        'specifications',
        'in_stock',
    ];

    public function images(){

        return $this->belongsToMany('App\Image');

    }
}
