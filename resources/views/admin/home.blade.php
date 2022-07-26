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

                <form action="{{ route('admin.users.destroy', $user->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger my-3" type="submit" onclick="doctors.openModal(event, {{$user->id}} )">Elimina profilo</button>    
                </form>

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
                                <h4>{{$review->created_at}}</h4>
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
                    <div>
                        <h1>Sponsorizzazioni attive</h1>
                        @if (count($doctor->sponsors))
                        <ul>
                            @foreach($doctor->active_sponsor as $sponsor)
                            <li>
                                <p>{{$sponsor->name}}</p>
                                <p>Inizio: {{$sponsor->pivot->date_start}}</p>
                                <p>Scadenza: {{$sponsor->pivot->date_end}}</p>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        {{-- @if (count($doctor->sponsors)) --}}
                        <ul>
                            @foreach($sponsors as $sponsor)
                            <li>
                                <h3>{{$sponsor->name}}</h3>
                                <a href="{{route('admin.sponsor.pay', $sponsor->name)}}">Vai al pagamento</a>
                            </li>
                            @endforeach
                        </ul>
                        {{-- @else
                            <form action="{{route('admin.doctors.update', $doctor->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                @foreach($sponsors as $sponsor)
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="sponsor" id="{{$sponsor->name}}" value="{{$sponsor->id}}">
                                        <label class="form-check-label" for="{{$sponsor->name}}">{{$sponsor->name}}</label>
                                    </div>
                                @endforeach
                                <button class="btn btn-outline-primary" type="submit">Seleziona</button>
                            </form>
                        @endif --}}
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
