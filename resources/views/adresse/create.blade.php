<!-- resources/views/adresse/create.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
      <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
              <li><a href="{{ URL::to('/') }}">View All Adresse</a></li>
              <li><a href="{{ URL::to('users/') }}">View All Users</a>
          </ul>
      </nav>
<h1>Create a Adresse, Rolle, User and Userrights </h1>
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
<form action="{{ url('/adresse') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="formGroupExampleInput">Type:</label>
        <input type="text" name="typ" id="typ" required class="form-control" value="{{ old('typ') }}">
        <small class="form-text text-muted">Type Ihr Konto: Frau oder Herr</small>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Name:</label>
        <input type="text" name="name" id="name" required class="form-control" value="{{ old('name') }}">
        <small class="form-text text-muted">Vor und Nachname</small>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Email:</label>
        <input type="email" name="email" id="email" required class="form-control" value="{{ old('email') }}">
        <small class="form-text text-muted">Bitte gültige Email</small>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Project:</label>
        <input type="text" name="projekt" id="projekt" required  class="form-control" value="{{ old('projekt') }}">
        <small class="form-text text-muted">Entweder abkürzung: vm000 oder alle für alle projekte</small>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Username:</label>
        <input type="username" name="username" id="username" required class="form-control" value="{{ old('username') }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Password:</label>
        <input type="password" name="password" id="password" required class="form-control" value="{{ old('password') }}">
        <small class="form-text text-muted">Mindestens 8 Zeichen</small>
    </div>
    <div class="form-group">
</div>
<!-- Add Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-default">
             <i class="fa fa-btn fa-plus"></i>Add
         </button>
     </div>
 </div>
</form>
</div>
@endsection
