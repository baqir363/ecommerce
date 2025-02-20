<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $guarded=[];

    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }
}
