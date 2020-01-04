<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    protected $table = "pcs";

    public function race()
    {
        return $this->belongsTo('App\Race');
    }
}
