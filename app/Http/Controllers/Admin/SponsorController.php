<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sponsor;

class SponsorController extends Controller

{
    

    public function index(){
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }


    public function store(Sponsor $sponsor) {
        //dd($request->sponsors);
        //$data = $request->sponsors;
        //$sponsor = Sponsor::find(1);
        //$newSponsor = new Sponsor()
        //$sponsor->roles()->attach($roleId);
        // $currentUser = Auth::user();
        // $user_id = $currentUser->id;
        // $sponsor->doctors()->attach($user_id, ['']);        
        // if(isset($request->sponsors)){
        // }else{
        //     $sponsor->doctors()->sync([]);        
        // }
        

        
    }

    // public function update(Request $request, Sponsor $sponsor)
    // {
    //     $request->validate($this->validationRule);
    //     $data = $request->all();
    //     if($sponsor->name != $data['name']){
    //         $tag->name = $data['name'];
    //         $slug = Str::of($tag->name)->slug("-");
    //         if($slug !=  $tag->slug) {
    //             $tag->slug = $this->getSlug($tag->name);
    //         }
    //     }
    //     $tag->update();
    //     return redirect()->route('admin.tags.show',$tag->id);
    // }
}
