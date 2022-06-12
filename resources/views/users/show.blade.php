<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Username:</strong> {{ $user->username }}<br>
            <strong>Type:</strong>{{ $user->type }} User <br>
            <strong>Password:</strong> {{ $user->password }}<br>
        </p>
    </div>
</div>
@endsection
@extends('components.footer')
