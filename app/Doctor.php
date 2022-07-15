<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    protected $with = ['reviews'];


    protected $appends = ['average_vote'];


    public function getAverageVoteAttribute()
    {
        return $this->attributes['average_vote'] = floor($this->reviews->avg('votes'));
    }

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
        return $this->belongsToMany('App\Sponsor');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
