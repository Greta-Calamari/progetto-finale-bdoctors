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
                            @if ($doctor->photo)
                            <img src="{{asset('storage/' . $doctor->photo)}}" alt="{{$doctor->name}}">
                            @else
                            <img src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" alt="{{$doctor->name}}">
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <h3>{{$doctor->name}} {{$doctor->surname}}</h3>
                            <p>{{Auth::user()->email}}</p>                            
                            <a class="btn cs_btn mb-2" href="{{route('admin.doctors.show', $doctor->id)}}">Vedi profilo completo</a>
                            <a class="btn cs_btn mb-2" href="{{route('admin.doctors.edit', $doctor->id)}}">Modifica profilo</a>
                            <form action="{{ route('admin.users.destroy', $user->id ) }}" method="post" text-right>
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
                            <p class="pt-3">{{$message->content}}</p>
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
                            <p class="pt-3">{{$review->comment}}</p>
                        </li>
                            
                        @endforeach
                    </ul>
                </div>
               

                
                <div class="tab-pane fade" id="list-statistics" role="tabpanel" aria-labelledby="list-statistics-list">
                    <h3>Work in progress</h3>
                </div>
                <div class="tab-pane fade" id="list-sponsors" role="tabpanel" aria-labelledby="list-sponsors-list">
                    
                    <div class="row row_sponsor">
                        @foreach($sponsors as $sponsor)
                        <div class="col-6 col-md-4 text-center">
                            <div class="my_card">
                                <a href="{{route('admin.sponsor.pay', $sponsor->name)}}">
                                    <h3 class="">{{$sponsor->name}}</h3>
                                    <p><i class="fa-solid fa-tag"></i>  {{$sponsor->price}}€</p>
                                    <p><i class="fa-solid fa-clock"></i> {{$sponsor->duration_in_hours}} ore</p>
                                </a>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                    

                    @if (count($doctor->active_sponsor) > 0)
                    <h3 class="text-center tit">Sponsorizzazioni attualmente in corso</h3>
                    <ul>
                        @foreach($doctor->active_sponsor as $sponsor)
                        <li class="card card_2 my-3">
                            <h5>{{$sponsor->name}}</h5>
                            <p><i class="fa-solid fa-calendar"></i> Data di inizio: {{date('d-m-Y', strtotime($sponsor->pivot->date_start))}}</p>
                            <p><i class="fa-solid fa-calendar"></i> Data di fine: {{date('d-m-Y', strtotime($sponsor->pivot->date_end))}}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    @if (count($doctor->sponsors) > 0)
                    <h3 class="text-center tit">Tutte le sponsorizzazioni</h3>
                    <ul>
                        @foreach($doctor->sponsors as $sponsor)
                        <li class="card my-3">
                            <h5>{{$sponsor->name}}</h5>
                            <p><i class="fa-solid fa-calendar"></i> Data di inizio: {{date('d-m-Y', strtotime($sponsor->pivot->date_start))}}</p>
                            <p><i class="fa-solid fa-calendar"></i> Data di fine: {{date('d-m-Y', strtotime($sponsor->pivot->date_end))}}</p>
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
