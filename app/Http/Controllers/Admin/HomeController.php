<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Sponsor;

class HomeController extends Controller
{
    public function index(){
        $currentUser = Auth::user();

        $doctor = Doctor::where('user_id', $currentUser->id)->first();
        $sponsors = Sponsor::all();
        

        return view('admin.home', compact('doctor', 'sponsors'));
    }
}
