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
    {{ csrf_field() }}

    <div class="form-group">
        <label class=formGroupExampleInput">Bitte wählen Sie Ihr Kontotype aus</label>
    <select class="form-control" name="typ" id="typ" required>
        <option name="typ" value="frau">Frau</option>
        <option name="typ" value="herr">Herr</option>
    </select>
        <small class="form-text text-muted">z.B. Frau oder Herr</small>
    </div>
    <div class="form-group">
        <input type="text" name="name" id="name" required placeholder="Ihr Name"
               class="form-control" value="{{ old('name') }}">
        <small class="form-text text-muted">Vor und Nachname</small>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <input type="email" name="email" id="email" required placeholder="Email Adresse"
               class="form-control" value="{{ old('email') }}">
        <small class="form-text text-muted">Bitte gültige Email</small>
        @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Telefon:</label>
        <input type="text" name="telefon" id="telefon" placeholder="Optional"
               class="form-control" value="{{ old('telefon') }}">
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Ansprechpartner:</label>
        <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
               class="form-control" value="{{ old('ansprechpartner') }}">
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Team:</label>
        <select class="form-control" name="abteilung" id="abteilung">
            <option class="form-control" value="{{ old('abteilung') }}">Bitte wählen Sie Ihr Team aus</option>
            @foreach(\App\Models\Team::get() as $team)
                <option name="abteilung" id="abteilung">{{$team->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Bitte geben Sie Dienstleister Type</label><br>
        <input type="radio" id="checkbox" name="checkbox" value="Intern"
               checked>
        <label class="formGroupExampleInput">Intern</label>
            <input type="radio" id="checkbox" name="checkbox" value="Extern"
                   checked>
            <label class="formGroupExampleInput">Extern</label>
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Username:</label>
        <input type="text" name="username" id="username" required class="form-control" value="{{ old('username') }}">
        @if ($errors->has('username'))
            <span class="error">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Password:</label>
        <input type="password" name="password" id="password" required class="form-control" value="{{ old('password') }}">
        <small class="form-text text-muted">Mindestens 8 Zeichen</small>
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    @endforeach
        <div class="form-group"></div>
<!-- Add Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-small btn-info">
             <i class="fa fa-btn fa-plus"></i>Add
         </button>
     </div>
 </div>
</form>
</div>
@endsection
@extends('components.footer')
