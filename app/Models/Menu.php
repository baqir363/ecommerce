<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded=[];

    public function links(){
        return $this->hasMany(\App\Models\Link::class);
    }
}
