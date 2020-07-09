<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','slug','image_id'];

    public function image(){

        return $this->belongsTo('App\Image');

    }
}
