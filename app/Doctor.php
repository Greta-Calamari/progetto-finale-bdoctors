<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function messages(){
        return $this->hasMany('App\Messages');
    }
}
