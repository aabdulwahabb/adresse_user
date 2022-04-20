<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>Edit {{ $adress->name }}</h1>
<!-- if there are creation errors, they will show here -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('adresse') }}/{{$adress->id }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH')}}
    <div class="form-group">
        <label for="formGroupExampleInput">Type:(dropdown)</label>
        <input type="text" name="typ" class="form-control" value="{{ $adress->typ }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $adress->name }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Email:</label>
        <input type="text" name="email" class="form-control" value="{{ $adress->email }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Rolle:(dropdown und text)</label>
        <input type="text" name="rolle" class="form-control" value="{{ $adress->subjekt }}">
    </div>
    <div class="form-group">
</div>
<!-- Update Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-default">
             <i class="fa fa-btn fa-plus">update</i>
         </button>
     </div>
 </div>
</form>
</div>
@endsection
@extends('components.footer')
