<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use illuminate\Support\Str;
class Doctor extends Model
{
    protected $guarded = [];

    public static function generateSlug($name, $surname){
        $newName = $name.' '.$surname;
        $slug = Str::of($newName)->slug('-');
        $count = 1;
        while(Doctor::where('slug', $slug)->first()){
            $slug = Str::of($newName)->slug('-')."-{$count}";
            $count++;
        }
        return $slug;
    }

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

    public function active_sponsor(){
        $currentDate = Carbon::now();
        return $this->sponsors()->using('App\DoctorSponsor')->withPivot('date_start', 'date_end')->where('date_start','<=' , $currentDate)->where('date_end', '>=', $currentDate);
    }
}
