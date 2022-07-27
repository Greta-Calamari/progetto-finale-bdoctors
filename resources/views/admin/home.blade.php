@extends('layouts.admin')
@include('partials/popupDelete')
{{-- @dd($user) --}}

@section('content')

<div class="container" id="home">
    <div class="row">
        <div class="col-lg-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messaggi</a>
                <a class="list-group-item list-group-item-action" id="list-reviews-list" data-toggle="list" href="#list-reviews" role="tab" aria-controls="reviews">Recensioni</a>
                <a class="list-group-item list-group-item-action" id="list-statistics-list" data-toggle="list" href="#list-statistics" role="tab" aria-controls="statistics">Statistiche</a>
                <a class="list-group-item list-group-item-action" id="list-sponsors-list" data-toggle="list" href="#list-sponsors" role="tab" aria-controls="sponsors">Sponsorizzazioni</a>

                

            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <img src="{{asset('storage/'.$doctor->photo)}}" alt="{{$doctor->name}}">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h3>{{$doctor->name}} {{$doctor->surname}}</h3>
                            <p>{{Auth::user()->email}}</p>                            
                            <a class="btn cs_btn mb-2" href="{{route('admin.doctors.show', $doctor->id)}}">Vedi profilo completo</a>
                            <a class="btn cs_btn mb-2" href="{{route('admin.doctors.edit', $doctor->id)}}">Modifica profilo</a>
                            <form action="{{ route('admin.users.destroy', $user->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn cs_btn" type="submit" onclick="doctors.openModal(event, {{$user->id}} )">Elimina profilo</button>    
                            </form>
                        </div>
                       
                    </div>
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <ul>
                        @foreach ($doctor->messages as $message)
                        <li class="card my-3">
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
                        <li class="card my-3">
                            <div>
                                <h6 class="text-end">{{date('d-m-Y', strtotime($review->created_at))}}</h6>
                                <h5>{{$review->name}}</h5>
                            
                                <h6 class="text-center">@for ($i = 0; $i < $review->votes; $i++)
                                    <span class="fa fa-star" style="color: orange"></span>
                                @endfor</h6>

                            </div>  
                            <p>{{$review->comment}}</p>
                        </li>
                            
                        @endforeach
                    </ul>
                </div>
               

                
                <div class="tab-pane fade" id="list-statistics" role="tabpanel" aria-labelledby="list-statistics-list">Statistiche</div>
                <div class="tab-pane fade" id="list-sponsors" role="tabpanel" aria-labelledby="list-sponsors-list">
                    
                    <div class="row row_sponsor">
                        @foreach($sponsors as $sponsor)
                        <div class="col-6 col-sm-4 col-md-2 col-lg-3 card text-center col_sponsor my-4">
                            <a href="{{route('admin.sponsor.pay', $sponsor->name)}}">
                                <h3 class="">{{$sponsor->name}}</h3>
                                <p>prezzo: {{$sponsor->price}}€</p>
                                <p>durata {{$sponsor->duration_in_hours}} ore</p>
                            </a>
                            <div class="overflow"></div>
                        </div>
                        
                        @endforeach
                    </div>
                    

                    <h1>Sponsorizzazioni attive</h1>
                    @if (count($doctor->sponsors))
                    <ul>
                        @foreach($doctor->active_sponsor as $sponsor)
                        <li class="card my-3">
                            <p>{{$sponsor->name}}</p>
                            <p>Inizio: {{date('d-m-Y', strtotime($sponsor->pivot->date_start))}}</p>
                            <p>Scadenza: {{date('d-m-Y', strtotime($sponsor->pivot->date_end))}}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif

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
