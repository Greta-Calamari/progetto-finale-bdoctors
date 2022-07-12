@extends('layouts.admin')


@section('content')

    <section>
        <h1>{{$doctor->name}} {{$doctor->surname}} </h1>
        <a href="{{route('admin.doctors.edit', $doctor->id)}}">EDit</a>

        <p>{{$doctor->address}} </p>
        <p>{{$doctor->cell_number}} </p>
        <img src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->surname}}">
        <iframe src="{{asset('storage/' . $doctor->curriculum_vitae)}}" width=”300” height=”800”></iframe>
            
        
        <p>{{$doctor->services}}</p>
        <ul>
            @foreach ($doctor->specializations as $specialization)
                <li>{{$specialization->name}}</li>
            @endforeach
        </ul>

        <ul>
            
            @foreach ($doctor->reviews as $review)
                <li>{{$review->name}}</li>
            @endforeach
        </ul>

        <ul>
            @foreach ($doctor->messages as $message)
                <li>{{$message->name}}</li>
            @endforeach
        </ul>
        
    </section>
@endsection