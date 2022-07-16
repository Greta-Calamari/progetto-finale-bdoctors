@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-6">
        
        <ul>
            DOTTORI
            @foreach ($doctors as $doctor)
                <h3>{{$doctor->name}} {{$doctor->id}}</h3>
            @endforeach
        </ul>

    </div>
    <div class="col-6">
        <ul>
            USERS
            @foreach ($users as $user)
                <h3>{{$user->name}} {{$user->id}}</h3>
            @endforeach
        </ul>
    </div>
</div>

@endsection