@extends('layouts.admin')
@include('partials/popupdelete')
{{-- @dd($user) --}}

@section('content')
<div class="container" id="home">
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messaggi</a>
                <a class="list-group-item list-group-item-action" id="list-reviews-list" data-toggle="list" href="#list-reviews" role="tab" aria-controls="reviews">Recensioni</a>
                <a class="list-group-item list-group-item-action" id="list-statistics-list" data-toggle="list" href="#list-statistics" role="tab" aria-controls="statistics">Statistiche</a>
                <a class="list-group-item list-group-item-action" id="list-sponsors-list" data-toggle="list" href="#list-sponsors" role="tab" aria-controls="sponsors">Sponsorizzazioni</a>

                <form action="{{ route('admin.doctors.destroy', $doctor->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="doctors.openModal(event, $user->id, $doctor->id )">Elimina profilo</button>    
                </form>

            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                        </div>
                        <div class="col-6">
                            <h3>{{$doctor->name}} {{$doctor->surname}}</h3>
                            <p>{{Auth::user()->email}}</p>
                            <a class="btn cs_btn" href="{{route('admin.doctors.show', $doctor->id)}}">Vedi profilo completo</a>
                            <a class="btn cs_btn" href="{{route('admin.doctors.edit', $doctor->id)}}">Modifica profilo</a>
                        </div>
                       
                    </div>
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <ul>
                        @foreach ($doctor->messages as $message)
                        <li>
                            <div>
                                <h5>{{$message->name}}</h5>
                                <h6>{{$message->email}}</h6>
                            </div>  
                            <p>{{$message->content}}</p>
                        </li>
                            
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="list-reviews" role="tabpanel" aria-labelledby="list-reviews-list">
                    
                    <ul>
                        @foreach ($doctor->reviews as $review)
                        <li>
                            <div>
                                <h5>{{$review->name}}</h5>
                            
                                <h6>{{$review->votes}}</h6>

                                

                            </div>  
                            <p>{{$review->comment}}</p>
                        </li>
                            
                        @endforeach
                    </ul>
                </div>
               

                
                <div class="tab-pane fade" id="list-statistics" role="tabpanel" aria-labelledby="list-statistics-list">Statistiche</div>
                <div class="tab-pane fade" id="list-sponsors" role="tabpanel" aria-labelledby="list-sponsors-list">
                    <div class="row">
                        @foreach ($sponsors as $sponsor)
                        <div class="col-4">
                            <button class="btn cs_btn">{{$sponsor->name}}</button>
                        </div>
                        @endforeach
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
{{-- 
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
