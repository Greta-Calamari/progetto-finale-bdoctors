@extends('layouts.admin')


@section('content')

    <section>
        <div class="container modfica-profile">
    
    <form action="{{route('admin.doctors.update', $doctor->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="row">
            <div class="col col-md-6 col-lg-3 ">
                <div class="mb-3 mt-3">
                    
                    <div class="container-photo">
                        <img id="imgPreview" src="{{asset('storage/' . $doctor->photo)}}">
                    </div>
                </div>
            </div>

            <div class="col col-sm-12 col-md-6 col-lg-5">
                <h2>Modifica il tuo profilo</h2>
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
                </div>
        </div>
    </form>
</div>

@endsection
