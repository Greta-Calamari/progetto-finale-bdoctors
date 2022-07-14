@extends('layouts.admin')

@section('content')
<div class="container">
    

    <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div id="dropin-container"></div>
            <button id="submit-button">Submit</button>
          </div>
        </div>
     </div>
   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <script>
         let button = document.querySelector('#submit-button');

                braintree.dropin.create({
                authorization: "{{ Braintree_ClientToken::generate() }}",
                container: '#dropin-container'
                }, function (createErr, instance) {
                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                    $.get('{{ route('payment.process') }}', {payload}, function (response) {
                        if (response.success) {
                        alert('Payment successfull!');
                        } else {
                        alert('Payment failed');
                        }
                    }, 'json');
                    });
                });
                });

    </script>
        
    
@endsection 