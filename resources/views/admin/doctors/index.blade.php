@extends('layouts.admin')

@section('content')
<ul>
    @foreach ($doctors as $doctor)
        <h3>{{$doctor->name}}</h3>
    @endforeach
</ul>
@endsection