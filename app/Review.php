<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}

