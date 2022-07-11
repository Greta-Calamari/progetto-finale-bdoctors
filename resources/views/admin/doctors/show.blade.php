@extends('layouts.admin')

@section('content')
    <section>
        <h1>{{$doctor->name}} {{$doctor->surname}} </h1>
        <a href="{{route('admin.doctors.edit', $doctor->id)}}">EDit</a>

        <p>{{$doctor->address}} </p>
        <p>{{$doctor->cell_number}} </p>
        <img src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->surname}}">
        {{-- <embed src="{{asset('storage/' . $doctor->curriculum_vitae)}}" width="300" height="400" type="application/pdf"> --}}
        <p>{{$doctor->services}}</p>
        <ul>
            @foreach ($doctor->specializations as $specialization)
                <li>{{$specialization->name}}</li>
            @endforeach
        </ul>
    </section>
@endsection