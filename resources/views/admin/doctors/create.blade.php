@extends('layouts.admin')

@section('content')
<h2 class="text-center mb-5 title-ed-cr">Crea il tuo profilo</h2>   
<div class="container modifica-profilo">
    {{-- profilo create --}}
    <form action="{{route('admin.doctors.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-12 col-lg-4 border-col">
                <div class="mb-3 mt-3">
                    <label for="photo" class="form-label d-block">Inserisci Foto</label>
                    <div class="container-photo">
                        <img id="imgPreview" width="100" src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" alt="">
                    </div>
                    <input type="file" id="photo" name="photo" onchange="doctors.previewImage()">
                    @error('photo')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                    
                </div>
                <div class="note d-none d-lg-block">
                    <span class="obbligatorio">*</span><span>Campo obbligatorio</span>
                </div>
            </div>

            <div class="col col-12 col-lg-4 border-col">
                
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome<span class="obbligatorio">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required maxlength="50" placeholder="inserisci il tuo nome">
                            @error('name')
                                <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="surname" class="form-label">Cognome<span class="obbligatorio">*</span> </label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{old('surname')}}" required maxlength="50"placeholder="inserisci il tuo cognome">
                            @error('surname')
                                <div class="alert alert-danger"> {{$message}} </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="cell_number" class="form-label">Numero di telefono<span class="obbligatorio">*</span></label>
                    <input type="tel" class="form-control @error('cell_number') is-invalid @enderror" id="cell_number" name="cell_number" value="{{old('cell_number')}}" required maxlength="20" placeholder="inserisci il tuo numero di telefono">
                    @error('cell_number')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo<span class="obbligatorio">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}" required maxlength="255" placeholder="inserisci il tuo indirizzo">
                    @error('address')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="curriculum_vitae" class="form-label d-block">Inserisci Curriculum</label>
                    <input type="file" id="curriculum_vitae" name="curriculum_vitae">
                    @error('curriculum_vitae')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="services" class="form-label">Prestazioni<span class="obbligatorio">*</span></label>
                    <textarea name="services" id="services" cols="30" rows="10" class="form-control @error('services') is-invalid @enderror" maxlength="1500">{{old('services')}}</textarea>
                    @error('services')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <button type="submit" class="btn cs_btn text-center d-none d-lg-block">Crea Profilo</button>
            </div>
            
            <div class="col col-12  col-lg-4">
                <div class="mb-3 mt-3">
                    <h6 class="form-label">Specializzazioni <span class="obbligatorio">*</span></h6>
                    @foreach($specializations as $specialization)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('category_id') is-invalid @enderror" name="specializations[]" id="{{$specialization->name}}" {{in_array($specialization->id,old('specializations',[])) ? 'checked' : ''}} value="{{$specialization->id}}">
                        <label class="form-check-label" for="{{$specialization->name}}">{{$specialization->name}}</label>
                    </div>
                    @endforeach
                    @error('category_id')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12 d-block d-lg-none mb-5">
            <button type="submit" class="btn cs_btn text-center">Crea Profilo</button>
            <div class="note">
                <span class="obbligatorio">*</span><span>Campo obbligatorio</span>
            </div>
        </div>
    </form>
</div>
@endsection