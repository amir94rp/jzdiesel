<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['redirection_link','image_id','title','active'];

    public function image(){

        return $this->belongsTo('App\Image');

    }
}
