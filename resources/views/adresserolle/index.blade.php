<!-- resources/views/adresserolle/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/create') }}">Create a Adresse</a>
        <li><a href="{{ URL::to('/') }}">View All Adresse</a>
        <li><a href="{{ URL::to('users/') }}">View All Users</a>
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
            <td>Action</td>
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

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- edit this adresseroll (uses the edit method found at GET /adresserolle/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/adresserolle/' . $value->id . '/edit') }}">Edit this AdresseRoll</a>

                <!-- delete the adressroll (uses the destroy method DESTROY /adresserolle/{id} -->
                <form action="./adresserolle/{{$value->id }}"  onsubmit="return confirm('Are you sure to delete:{{ $projekt->abkuerzung}}')" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash">Delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
  {!! $adresserolls->render() !!}
</div>
@endsection
