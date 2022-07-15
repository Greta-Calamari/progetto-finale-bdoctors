<?php

namespace App\Http\Controllers\Admin;
use App\Sponsor;
use App\Doctor;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $doctor = Doctor::find(1);
        $doctor->sponsors()->attach(1);
        dd($doctor->sponsors);
        return view('admin.home');
    }
}
