<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function pc()
    {
        return $this->hasMany('App\PC');
    }
}
