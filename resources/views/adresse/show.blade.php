<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>{{ $adress->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $adress->typ }}</h2>
        <p>
            <strong>Name:</strong> {{ $adress->name }}<br>
            <strong>Email:</strong> {{ $adress->email }}
        </p>
    </div>
</div>
@endsection
@extends('components.footer')
