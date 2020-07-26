<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=['image_id','redirection_link','header_one','header_two','paragraph','active'];

    public function image(){

        return $this->belongsTo('App\Image');

    }
}
