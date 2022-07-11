<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
}
