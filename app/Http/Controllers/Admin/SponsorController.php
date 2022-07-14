<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsor;

class SponsorController extends Controller
{

    public function index(){
        $sponsors = Sponsor::all();
        return view('admin.sponsors', compact('sponsors'));
    }


    public function store(Request $request) {

        $data = $request->all();

        $newSponsor = new Sponsor();
        $newSponsor->name = $data['name'];
        $newSponsor->price = $data['price'];
        $newSponsor->duration_in_hours = $data['duration_in_hours'];

        $newSponsor->save();
        return response()->json($newSponsor);
    }
}
