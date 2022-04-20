<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>{{ $user->username }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Username:</strong> {{ $user->username }}<br>
            <strong>Type:</strong>{{ $user->type }} User
        </p>
    </div>
</div>
@endsection
@extends('components.footer')
