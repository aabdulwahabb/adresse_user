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
        <select class="form-control" name="typ" id="typ">
            <option class="form-control" value="{{ old('name') }}">Bitte wählen Sie Ihr Kontotype aus</option>
            <option name="frau" value="frau">Frau</option>
            <option name="herr" value="herr">Herr</option>
        </select>
        <small class="form-text text-muted">z.B. Frau oder Herr</small>
        <input type="text" name="name" id="name" required placeholder="Ihr Name"
               class="form-control" value="{{ old('name') }}">
        <small class="form-text text-muted">Vor und Nachname</small>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
        <input type="email" name="email" id="email" required placeholder="Email Adresse"
               class="form-control" value="{{ old('email') }}">
        <small class="form-text text-muted">Bitte gültige Email</small>
        @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Bitte geben Sie Dienstleiter Type</label><br>
        <input type="radio" id="freifeld1" name="freifeld1" value="{{ old('freifeld1') }}"
               checked>
        <label for="formGroupExampleInput">Intern</label>
        <input type="radio" id="freifeld1" name="freifeld1" value="{{ old('freifeld1') }}"
               checked>
        <label for="formGroupExampleInput">Extern</label>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Team:</label>
        <select class="form-control" name="typ" id="typ">
            <option class="form-control">Bitte wählen Sie Ihr Team</option>
        </select>
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput">Telefon:</label>
        <input type="text" name="telefon" id="telefon" placeholder="Optional"
               class="form-control" value="{{ old('telefon') }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Ansprechpartner:</label>
        <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
               class="form-control" value="{{ old('ansprechpartner') }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Abteilung:</label>
        <input type="text" name="abteilung" id="abteilung" placeholder="Optional"
               class="form-control" value="{{ old('abteilung') }}">
    </div>

    <div class="form-group"></div>
<!-- Update Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-small btn-success">
             <i class="fa fa-btn fa-plus">update</i>
         </button>
     </div>
 </div>
</form>
</div>
@endsection
@extends('components.footer')
