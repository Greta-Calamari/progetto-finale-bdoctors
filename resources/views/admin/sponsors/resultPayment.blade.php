@extends('layouts.admin')

@section('content')
    {{-- @dd($risultato) --}}
    @if($risultato['result'] == true)
        <h1>Pagamento ok</h1>
    @else
        <h1>Pagament non ok</h1>
    @endif
@endsection