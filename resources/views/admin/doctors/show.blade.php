@extends('layouts.admin')


@section('content')

    <section>
        <div style="margin-left:10%">
            
            <img src="{{asset('storage/' . $doctor->photo)}}" class="rounded" style="border-radius:5%" alt="{{$doctor->surname}}">
        </div>
        <div class="col-sm-4" style="margin-left: 20%">
    <div class="card" style="width: 69rem">
        <div class="text-center">
            
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    {{$doctor->name}} {{$doctor->surname}} 
                </div>
            </div>
             <div class="card">
                <div class="card-body">
                    {{$doctor->address}} 
                </div>
            </div>
             <div class="card">
                <div class="card-body">
                    {{$doctor->cell_number}}
                </div>
            </div>
             <div class="card">
                <div class="card-body">
                     <iframe src="{{asset('storage/' . $doctor->curriculum_vitae)}}" width=”300” height=”800”></iframe>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  {{$doctor->services}}
                </div>
            </div>
           
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
               
       
       
        <a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn mybtn" style="margin-left: 45%">Modifica Profilo</a>
      </div>
    </div>
  </div>

@endsection














        <!--<h1>{{$doctor->name}} {{$doctor->surname}} </h1>
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
        
    </section>-->
