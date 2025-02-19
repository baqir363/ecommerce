<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function images(){
        return $this->hasMany(\App\Models\Image::class);
    }

    public function carts(){
        return $this->hasMany(\App\Models\Cart::class);
    }

    public function orders(){
        return $this->belongsToMany(\App\Models\Product::class);
    }
}
