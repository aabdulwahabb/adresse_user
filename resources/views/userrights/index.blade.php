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
        <h1>Showing Userrights by: {{ $user->username }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Username</td>
            <td>Module</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($userrights as $key => $value)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $value->module }}</td>
            <td>{{ $value->action }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
  {!! $userrightes->render() !!}
</div>
@endsection
