@extends('layouts.admin')


@section('content')

    <div class="container modifica-profilo">
    
        <form action="{{route('admin.doctors.update', $doctor->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="row">
                <div class="col col-md-6 col-lg-3 ">
                    <div class="mb-3 mt-3">
                        
                        <div class="container-photo">
                            <img id="imgPreview" width="100" src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                            {{-- <img id="imgPreview" width="100" src="">  --}}
                            </div>
                        </div>
                        <div>
                            <h2>{{$doctor->name}} {{$doctor->surname}} </h2>
                            <hr>
                        </div>
                    </div>

                <div class="col col-sm-12 col-md-6 col-lg-5">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
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
                        <iframe src="{{asset('storage/' . $doctor->curriculum_vitae)}}" width=”80” height=”200”></iframe>
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
                            </div>
                        </div>
                        <div class="col-6">
                            
                        </div>
                    </div>

                </div>
                
                <div class="col col-sm-12 col-md-12 col-lg-4">
                    <!--<div class="mb-3 mt-3">
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
                    </div>-->
                </div>

                <a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn cs_btn text-center">Modifica Profilo</a>
            </div>

        
            
            <div class="note">
                <div class="mb-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <ul>
                                        <h3>Review</h3>
                                        <hr>
                                            @foreach ($doctor->reviews as $review)
                                            <li>Nome: {{$review->name}}</li>
                                            <li>Commento: {{$review->comment}}</li>
                                            <li>Voto: {{$review->votes}}</li>
                                        @endforeach
                                    </ul>
                                </div>  
                            </div>

                        <div class="card">
                            <div class="card-body">
                                <ul>
                                    <h3>Messages</h3>
                                    <hr>
                                        @foreach ($doctor->messages as $message)
                                            <li>Nome: {{$message->name}}</li>
                                            <li>Email: {{$message->email}}</li>
                                            <li>Content: {{$message->content}}</li>
                                        @endforeach 
                                </ul>  
                            </div>
                        </div>

                </div>
            </div>
        </form>
    </div>


@endsection
