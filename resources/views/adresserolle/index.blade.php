<!-- resources/views/adresserolle/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('/create') }}">Adresse & User anlegen</a>
       <li><a href="{{ URL::to('/') }}">Alle Adresse</a>
       <li><a href="{{ URL::to('users/') }}">Alle Users</a>
       <li><a href="{{ URL::to('projekte/') }}">Alle Projekte</a>
    </ul>
</nav>
        <h1>Showing Rolle by: {{ $adress->name }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Rolle</td>
            <td>Zuordnung</td>
            <td>Auswahl</td>
            <td>Seit</td>
            <td>Bis</td>
        </tr>
    </thead>
    <tbody>
    @foreach($adresserolle as $key => $value)
        <tr>
            <td>{{ $value->subjekt }}</td>
            <td>{{ $value->objekt }}</td>
            <td>{{ $projekt->abkuerzung }}</td>
            <td>{{ $value->von }}</td>
            <td>{{ $value->bis }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
  {!! $adresserolls->render() !!}
</div>
@endsection
