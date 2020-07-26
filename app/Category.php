<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'slug',
        'has_parent',
        'parent_id',
        'image_id',
        'favorite',
    ];

    public function image(){

        return $this->belongsTo('App\Image');

    }
}
