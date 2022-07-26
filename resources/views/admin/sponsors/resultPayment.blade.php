@extends('layouts.admin')

@section('content')
    {{-- @dd($risultato) --}}
    @if($risultato['result'] == true)
        <div id="paymentResult" class="container">
            <div class="box">
                <h1>Ti ringraziamo per il tuo acquisto!</h1>
                <h4>La tua sponsorizzazione {{$sponsorization->name}} è stata correttamente attivata.</h4>
                <div class="box-info">
                    <p class="border">
                        <span class="label"> Inizio sponsorizzazione</span>
                        <span class="result"> {{date("d-m-Y, h:i:s", strtotime($dateStart))}}</span>
                    </p> 
                    <p>
                        <span class="label"> Fine sponsorizzazione</span>
                        <span class="result">{{date("d-m-Y, h:i:s", strtotime($dateEnd))}}</span>
                    </p> 
                </div>
                <div class="d-flex justify-content-between">
                    <a class="cs_link" href="{{url('/') }}"><i class="fa-solid fa-house"></i>Torna alla home</a>
                    <a class="cs_link" href="{{route('admin.home')}}">Torna alla dashboard<i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
    @else
    <div id="paymentResult" class="container">
        <div class="box">
            <h1>Ci dispiace!</h1>
            <h4>Purtroppo il pagamento non è andato a buon fine. Ti consigliamo di riprovare.</h4>
            <a class="cs_link text-center d-block margin" href="{{route('admin.home')}}">Torna alla dashboard<i class="fa-solid fa-user"></i></a>
        </div>
    </div>
    @endif
    
@endsection