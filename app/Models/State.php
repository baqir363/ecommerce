<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function cities(){
        return $this->hasMany(\App\Models\City::class);
    }

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }
}
