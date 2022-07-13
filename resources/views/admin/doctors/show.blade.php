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
            <h3>Review</h3>
            @foreach ($doctor->reviews as $review)
                <li>Nome: {{$review->name}}</li>
                <li>Commento: {{$review->comment}}</li>
                <li>Voto: {{$review->votes}}</li>
            @endforeach
        </ul>

        <ul>
            <h3>Messages</h3>
            @foreach ($doctor->messages as $message)
                <li>Nome: {{$message->name}}</li>
                <li>Email: {{$message->email}}</li>
                <li>Content: {{$message->content}}</li>
            @endforeach
        </ul>
        
    </section>
@endsection