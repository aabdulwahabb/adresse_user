<!-- resources/views/adresse/create.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>Create Adresse, Rolle, Xentral and Stechuhr User</h1>
<!-- if there are creation errors, they will show here -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @foreach(\App\Models\XentralUser::get() as $user)
<form action="{{ url('users') }}/{{$user->id }}" method="POST" class="form-horizontal">
    @csrf
    @endforeach
    <div class="form-group">
      <label class="control-label col-sm-2">Type:</label>
      <div class="col-sm-5">
        <select class="form-control" name="typ" id="typ">
            <option class="form-control" value="{{ old('typ') }}">Bitte wählen Sie Ihr Kontotype aus</option>
                <option name="typ" id="typ">Frau</option>
                <option name="typ" id="typ">Herr</option>
        </select>
        <small class="form-text text-muted">z.B. Frau oder Herr</small>
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Vollständige Name:</label>
      <div class="col-sm-5">
        <input type="text" name="name" id="name" required placeholder="Ihre Name"
               class="form-control" value="{{ old('name') }}">
        <small class="form-text text-muted">Vor und Nachname</small>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email-Adresse:</label>
      <div class="col-sm-5">
        <input type="email" name="email" id="email" required placeholder="Email Adresse"
               class="form-control" value="{{ old('email') }}">
        <small class="form-text text-muted">Bitte gültige Email</small>
        @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
  </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Telefon:</label>
        <div class="col-sm-5">
        <input type="text" name="telefon" id="telefon" placeholder="Optional"
               class="form-control" value="{{ old('telefon') }}">
    </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Ansprechpartner:</label>
        <div class="col-sm-5">
        <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
               class="form-control" value="{{ old('ansprechpartner') }}">
    </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Ihr Team:</label>
      <div class="col-sm-5">
        <select class="form-control" name="abteilung" id="abteilung">
            <option class="form-control" value="{{ old('abteilung') }}">Bitte wählen Sie Ihr Team aus</option>
            @foreach(\App\Models\Team::get() as $team)
                <option name="abteilung" id="abteilung">{{$team->name}}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">Optional</small>
    </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Benutzername:</label>
      <div class="col-sm-5">
        <input type="text" name="username" id="username" required class="form-control" value="{{ old('username') }}" placeholder="Username">
        <small class="form-text text-muted">Bitte Klein Buchstaben benutzen</small>
        @if ($errors->has('username'))
            <span class="error">{{ $errors->first('username') }}</span>
        @endif
    </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Passwort:</label>
      <div class="col-sm-5">
        <input type="password" name="password" id="password" required class="form-control" value="{{ old('password') }}" placeholder="Password">
        <small class="form-text text-muted">Bitte Mindestens 8 Zeichen vergeben</small>
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Passwort Wiederholen:</label>
      <div class="col-sm-5">
        <input type="password" name="repassword" id="repassword" required class="form-control" value="{{ old('repassword') }}" placeholder="Password Wiederholen">
        <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password</small>
        @if ($errors->has('repassword'))
            <span class="error">{{ $errors->first('repassword') }}</span>
        @endif
    </div>
  </div>
    <div class="form-group"></div>
<!-- Add Button -->
<div class="text-center">
<button type="submit" class="btn btn-small btn-info">
    <i class="fa fa-btn fa-plus"></i>
    Einfügen
</button>
<a class="btn btn-danger" href="{{ URL::to('/users') }}">Abbrechen</a>
<div class="form-group"></div>
</div>
</form>
</div>
<div class="form-group"></div>
@endsection
@extends('components.footer')
