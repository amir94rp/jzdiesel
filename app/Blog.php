<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['header','summary','body','image_id'];

    public function image(){

        return $this->belongsTo('App\Image');

    }
}
