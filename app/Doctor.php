<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    

    // public function rates() {
    //     return $this->hasMany(Rate::class);
    // }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specializations()
    {
        return $this->belongsToMany('App\Specialization');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor')->withPivot('date_start', 'date_end');
    }



    public function reviews(){
        return $this->hasMany('App\Review')->orderBy('created_at', 'desc');
    }
}
