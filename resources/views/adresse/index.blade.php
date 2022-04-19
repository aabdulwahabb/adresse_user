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
             <li><label for="formGroupExampleInput">Suche</label>
             <input type="text" name="name" id="name" required class="form-control">
    </ul>
</nav>
<h1>All Adresse</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Type</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($adresse as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->typ }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- show the adress (uses the show method found at GET /adresse/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('/adresse/' . $value->id) }}">Show this Adress</a>

                <!-- show the adressroll (uses the show method found at GET /adresse/{id} -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/adresserolle/adresse/' . $value->id) }}">Show Rolle</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
  {!! $adresse->render() !!}
</div>
@endsection
