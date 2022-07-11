<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $guarded = [];

    public function doctors(){
        return $this->belongsToMany('App\Doctor');
    }
}
