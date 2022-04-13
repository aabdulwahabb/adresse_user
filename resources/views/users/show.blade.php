<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
      <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}">View All Adresse</a></li>
            <li><a href="{{ URL::to('users/') }}">View All Users</a>
          </ul>
      </nav>
<h1>Showing {{ $user->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $user->type }}</h2>
        <p>
            <strong>Username:</strong> {{ $user->username }}<br>
            <strong>Type:</strong> {{ $user->type }}
        </p>
    </div>
</div>
@endsection
