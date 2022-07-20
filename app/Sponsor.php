<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Sponsor extends Model
{
    protected $guarded = [];

    public function doctors(){
        return $this->belongsToMany('App\Doctor')->withPivot('date_start', 'date_end')->orderBy('date_end', 'desc')->first();
    }
}
