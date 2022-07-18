@extends('layouts.admin')

@section('content')
    
<div class="container">
    <h1>Modifica il tuo profilo</h1>
    <form action="{{route('admin.doctors.update', $doctor->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$doctor->name}}" required maxlength="50">
            @error('name')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Cognome</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{$doctor->surname}}" required maxlength="50">
            @error('surname')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cell_number" class="form-label">Numero di telefono</label>
            <input type="tel" class="form-control @error('cell_number') is-invalid @enderror" id="cell_number" name="cell_number" value="{{$doctor->cell_number}}" required maxlength="20">
            @error('cell_number')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$doctor->address}}" required maxlength="255">
            @error('address')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label d-block">Insert photo</label>
            <img id="imgPreview" width="100" src="{{asset('storage/' . $doctor->photo)}}">
            <input type="file" id="photo" name="photo">
            @error('photo')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="curriculum_vitae" class="form-label d-block">Insert Curriculum Vitae</label>
            <input type="file" id="curriculum_vitae" name="curriculum_vitae">
            @error('curriculum_vitae')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="services" class="form-label">Prestazioni</label>
            <textarea name="services" id="services" cols="30" rows="10" class="form-control @error('services') is-invalid @enderror" maxlength="1500">{{$doctor->services}}</textarea>
            @error('services')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <div class="mb-3">
            <h6>Specializzazioni</h6>
            @foreach($specializations as $specialization)
            <div class="form-check">
                <input type="checkbox" class="form-check-input @error('category_id') is-invalid @enderror" name="specializations[]" id="{{$specialization->name}}" {{$doctor->specializations->contains($specialization->id) ? 'checked' : ''}} value="{{$specialization->id}}">
                <label class="form-check-label" for="{{$specialization->name}}">{{$specialization->name}}</label>
            </div>
            @endforeach
            @error('category_id')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>

        <div class="mb-3">
            <h6>Sponsorizzazione</h6>
            @foreach($sponsors as $sponsor)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="sponsors[]" id="{{$sponsor->name}}" {{in_array($sponsor->id,old('sponsors',[])) ? 'checked' : ''}} value="{{$sponsor->id}}">
                    <label class="form-check-label" for="{{$sponsor->name}}">{{$sponsor->name}}</label>
                </div>
            @endforeach
            
        </div>
        <button type="submit" class="btn cs_btn">Add</button>
    </form>
</div>
@endsection