<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
      <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
              <li><a href="{{ URL::to('/create') }}">Adresse & User anlegen</a></li>
              <li><a href="{{ URL::to('/') }}">Alle Adresse</a>
              <li><a href="{{ URL::to('users/') }}">Alle Users</a>
              <li><a href="{{ URL::to('projekte/') }}">Alle Projekte</a>
          </ul>
      </nav>
<h1>{{ $user->username }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Username:</strong> {{ $user->username }}<br>
            <strong>Type:</strong>{{ $user->type }} User
        </p>
    </div>
</div>
@endsection
