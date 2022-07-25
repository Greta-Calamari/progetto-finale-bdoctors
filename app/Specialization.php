<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Specialization extends Model
{
    protected $guarded = [];

    public static function generateSlug($name){
        $slug = Str::of($name)->slug('-');
        $count = 1;
        while(Doctor::where('slug', $slug)->first()){
            $slug = Str::of($name)->slug('-')."-{$count}";
            $count++;
        }
        return $slug;
    }

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
