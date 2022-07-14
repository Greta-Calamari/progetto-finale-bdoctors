@extends('layouts.admin')

@section('content')
<ul>
    @foreach ($sponsors as $sponsor)
        <h3>{{$sponsor->name}}</h3>
    @endforeach
</ul>
@endsection