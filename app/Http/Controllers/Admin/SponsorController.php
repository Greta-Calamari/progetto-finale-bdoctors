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

    public function token($type){
        //qui inizializzo braintree
        $gateway = new \Braintree\Gateway([
            'environment' => getenv('BRAINTREE_ENV'),
            'merchantId' => getenv('BRAINTREE_MERCHANT_ID'),
            'publicKey' => getenv('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => getenv('BRAINTREE_PRIVATE_KEY')
        ]);
        //genero il token e lo passo alla rotta
        $token = $gateway->ClientToken()->generate();
        $sponsor = Sponsor::where('name', $type)->first();
        return view('admin.sponsors.paymentForm', ['token' => $token, 'type' => $sponsor]);
    }
    public function process(){
        
    }
}
