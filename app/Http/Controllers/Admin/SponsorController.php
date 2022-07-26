<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sponsor;
use App\Doctor;

class SponsorController extends Controller

{
    public function index(){
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    public function token($sponsor){
        //qui inizializzo braintree
        $currentUser = Auth::user();
        $user_id = $currentUser->id;
        $doctor = Doctor::where('user_id', $user_id)->first();
        $gateway = new \Braintree\Gateway([
            'environment' => getenv('BRAINTREE_ENV'),
            'merchantId' => getenv('BRAINTREE_MERCHANT_ID'),
            'publicKey' => getenv('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => getenv('BRAINTREE_PRIVATE_KEY')
        ]);
        //genero il token e lo passo alla rotta
        $token = $gateway->ClientToken()->generate();
        $sponsor = Sponsor::where('name', $sponsor)->first();
        return view('admin.sponsors.paymentForm', ['token' => $token, 'sponsor' => $sponsor, 'doctor'=> $doctor]);
    }

    public function process(Request $request, $sponsor){
        //dd($request);
        $sponsorization = Sponsor::where('name', $sponsor)->first();
        //trovo il dottore
        $currentUser = Auth::user();
        $user_id = $currentUser->id;
        $doctor = Doctor::where('user_id', $user_id)->first();

        //qui inizializzo braintree
        $gateway = new \Braintree\Gateway([
            'environment' => getenv('BRAINTREE_ENV'),
            'merchantId' => getenv('BRAINTREE_MERCHANT_ID'),
            'publicKey' => getenv('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => getenv('BRAINTREE_PRIVATE_KEY')
        ]);

        //nonce dal cliente
        $nonceFromTheClient = $request->payment_method_nonce;
        //risultato
        $result = $gateway->transaction()->sale([
            'amount' => $sponsorization->price,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
              'submitForSettlement' => True
            ]
        ]);
        //dd($result);
        if($result->success){
            //dd($sponsorization);
            if(count($doctor->sponsors) > 0){
                //dd($doctor->sponsors->pivot);
                $lastSp = $doctor->sponsors()->orderByDesc('pivot_date_end')->first();
                $dateStart = $lastSp->pivot->date_end;
                //dd($dateStart);
            }else{
                $dateStart = date("Y-m-d H:i:s");
            }
            
            //global $dateEnd;
            if($sponsorization->id == 1){
                $dateEnd = date('Y-m-d H:i:s', strtotime($dateStart. ' + 24 hours'));
            }else if($sponsorization->id == 2){
                $dateEnd = date('Y-m-d H:i:s', strtotime($dateStart. ' + 72 hours'));
            }else{
                $dateEnd = date('Y-m-d H:i:s', strtotime($dateStart. ' + 144 hours'));
            }
            //dd($dateStart, $dateEnd);
            //dd($dateStart, $dateEnd);
            $sponsorization->doctors()->attach($doctor->id, ['date_start'=>$dateStart, 'date_end'=>$dateEnd]); 
            $risultato = ['result'=>true];
            return view('admin.sponsors.resultPayment', compact('risultato', 'sponsorization', 'dateStart', 'dateEnd'));      
        }else{
            $risultato = ['result'=>false];
            return view('admin.sponsors.resultPayment', compact('risultato'));
        }
    }
}
