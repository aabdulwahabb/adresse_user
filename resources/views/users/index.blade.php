<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>All the Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Login</td>
            <td>Typ</td>
            <td>Beschreibung</td>
            <td>Aktiv</td>
            <td>Extern</td>
            <td>Anzahl Rechte</td>
            <td>Menü</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->username }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $adresse->name}}</td>
            @if($value->activ == 1)
                <td>ja</td>
            @elseif($value->activ == 0)
                <td>-</td>
            @endif
            @if($value->externlogin == 1)
            <td>erlaubt</td>
            @elseif($value->externlogin == 0)
                <td>-</td>
            @endif
            <td> Anzahl Rechte</td>

            <!-- we will also add show, and delete buttons -->
            <td>
                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('/users/' . $value->id) }}">Mitarbeiter Karte</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-danger" href="{{ URL::to('users/' . $value->id . '/edit') }}">Bearbeiten</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {!! $users->render() !!}
</div>
@endsection
@extends('components.footer')
