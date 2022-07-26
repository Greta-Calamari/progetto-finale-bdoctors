@extends('layouts.admin')


@section('content')

    <div class="container show">
            <div class="row">
                <div class="col-6  ">
                    <div class="row">
                        
                        <img  width="100" src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                        
                        <button><a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn cs_btn text-center">Modifica Profilo</a></button>
                    </div>
                </div>
                
                {{-- info  --}}
                <div class="col-6">
                    {{-- info doctors  --}}
                    <ul>
                        <li>Nome: {{$doctor->name}} {{$doctor->surname}}</li>
                        <hr>
                        <li>Indirizzo: {{$doctor->address}}</li>
                        <hr>
                        <li>Telefono: {{$doctor->cell_number}}</li>
                        <hr>
                        <li>Servizzo: {{$doctor->services}}</li>
                        <hr>
                        <h3>Specializzazioni: </h3>
                        @foreach ($doctor->specializations as $specialization)
                            <li>{{$specialization->name}}</li>
                        @endforeach

                    </ul>
                    
                    {{-- <div class="row">
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
                    </div> --}}

                </div>
                
                
                
            </div>

        
            
            
        
    </div>


@endsection
