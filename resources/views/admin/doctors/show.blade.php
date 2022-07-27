@extends('layouts.admin')


@section('content') 

    <div class="container show-container ">
            <div class="row justify-content-center align-items-center container-all">
                <div class="left  col-lg-6 col-md-6 col-sm-12 ">
                    <div class="bg d-flex flex-column justify-content-center align-items-center ">
                        @if ($doctor->photo)
                        <img src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                        @else
                        <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" alt="{{$doctor->name}}">
                        @endif
                        
                        {{-- Specializzazioni  --}}
                        <div class="specializzazioni text-center">
                            <hr>
                            <h3><i class="fa-solid fa-stethoscope"></i> Specializzazioni</h3>
                            @foreach ($doctor->specializations as $specialization)
                                <span class="specs">{{$specialization->name}}</span>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                {{-- info  --}}
                <div class="col-lg-6 col-md-6 col-sm-12 info-container">
                    {{-- info doctors  --}}
                    <ul class="p-0">
                        <li><h3><i class="fa-solid fa-user"> </i> {{$doctor->name}} {{$doctor->surname}}</h3></li>
                        <li><h3><i class="fa-solid fa-map-location"></i>  {{$doctor->address}}</h3> </li>
                        <li><h3><i class="fa-solid fa-phone"></i> {{$doctor->cell_number}}</h3> </li>
                        <li><h3><i class="fa-solid fa-notes-medical"></i> {{$doctor->services}} </h3></li>
                        <li><h4><a href="/storage/{{$doctor->curriculum_vitae}}" download="newfilename">Download curriculum</a></h4></li>
                        
                        <li><button><a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn cs_btn text-center">Modifica Profilo</a></button></li>

                    </ul>
                      
            </div>
    </div>


@endsection