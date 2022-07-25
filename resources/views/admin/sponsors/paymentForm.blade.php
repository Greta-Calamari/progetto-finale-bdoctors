@extends('layouts.admin')

@section('content')
<div id="paymentForm" class="container">
    <h1 class="text-center">Checkout</h1>
    <ul class="dati ps-0">
        <li><span class="label"><i class="fa-solid fa-user"></i>Nome</span>{{$doctor->name}} {{$doctor->surname}}</li>
        <li><span class="label"><i class="fa-solid fa-map-location"></i>Indirizzo</span>{{$doctor->address}}</li>
        <li><span class="label"><i class="fa-solid fa-phone"></i>Numero di Telefono</span>{{$doctor->cell_number}}</li>
        <li><span class="label"><i class="fa-solid fa-tag"></i>Tipo di sponsorizzazione</span>{{$sponsor->name}}</li>
        <li><span class="label"><i class="fa-solid fa-clock"></i>Duarata sponsorizzazione</span>{{$sponsor->duration_in_hours}} ore</li>
        <li><span class="label"><i class="fa-solid fa-cart-shopping"></i>Totale</span>{{$sponsor->price}} &euro;</li>
    </ul>
    <form method="POST" id="payment-form" action="{{route('admin.sponsor.process', $sponsor->name)}}">
        @csrf
        <section class="my-5">
            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <div class="d-flex justify-content-center">
            <button class="btn cs_btn" type="submit"><span>Paga Ora</span></button>
        </div>

    </form>
</div>
{{--braintree setup--}}
<script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";
    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            let button = document.querySelector('.btn');
            button.disabled = true;
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>
@endsection