<!-- resources/views/adresse/index.blade.php -->
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
<h1>All Projekte</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Projekt Name</td>
            <td>Abkürzung</td>
            <td>Verantwortlicher</td>
        </tr>
    </thead>
    <tbody>
    @foreach($projekte as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->abkuerzung }}</td>
            <td>{{ $value->verantwortlicher }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
  {!! $projekte->render() !!}
</div>
@endsection
