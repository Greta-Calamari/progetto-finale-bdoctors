<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree_Transaction;

class PaymentController extends Controller
{
    public function process(Request $request)
{
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];

    $status = Braintree_Transaction::sale([
    'amount' => '50.00',
    'paymentMethodNonce' => $nonce,
    'options' => [
        'submitForSettlement' => True
    ]
    ]);

    return response()->json($status);
}

}
