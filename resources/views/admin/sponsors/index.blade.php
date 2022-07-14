@extends('layouts.admin')

@section('content')
<form action="{{route('admin.sponsors.store')}}" method="post">
    @csrf
    @foreach($sponsors as $sponsor)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="sponsors[]" id="{{$sponsor->name}}" {{in_array($sponsor->id,old('sponsors',[])) ? 'checked' : ''}} value="{{$sponsor->id}}">
            <label class="form-check-label" for="{{$sponsor->name}}">{{$sponsor->name}}</label>
        </div>
        @endforeach
        <button type="submit">Seleziona</button>
</form>
@endsection