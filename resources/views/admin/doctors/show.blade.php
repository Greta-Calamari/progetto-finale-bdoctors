@extends('layouts.admin')


@section('content') 

    <div class="container show-container ">
            <div class="row justify-content-center align-items-center container-all">
                <div class="left  col-lg-6 col-md-6 col-sm-12 ">
                    <div class="bg d-flex flex-column justify-content-center align-items-center ">
                        <img  width="100" src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                        
                        {{-- Specializzazioni  --}}
                        <div class="specializzazioni text-center">
                            <hr>
                            <h4>Specializzazioni:</h4>
                            @foreach ($doctor->specializations as $specialization)
                                {{$specialization->name}}
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                {{-- info  --}}
                <div class="col-lg-6 col-md-6 col-sm-12 info-container">
                    {{-- info doctors  --}}
                    <ul class="">
                        <li><h2><i class="fa-solid fa-user"> </i> {{$doctor->name}} {{$doctor->surname}}</h2></li>
                        <hr>
                        <li><h2><i class="fa-solid fa-map-location"></i>  {{$doctor->address}}</h2> </li>
                        <hr>
                        <li><h2><i class="fa-solid fa-phone"></i> {{$doctor->cell_number}}</h2> </li>
                        <hr>
                        <li><h2><i class="fa-solid fa-notes-medical"></i> {{$doctor->services}} </h2></li>
                        <hr>
                        <li><h4><a href="/storage/{{$doctor->curriculum_vitae}}" download="newfilename">Download curriculum</a></h4></li>
                        
                        <li><button><a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn cs_btn text-center">Modifica Profilo</a></button></li>

                    </ul>
                      
            </div>
    </div>


@endsection
