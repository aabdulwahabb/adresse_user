<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <h1>Login und Stechuhr Benutzer Erstellen</h1>
        <!-- if there are creation errors, they will show here -->
        @include('components.createbody')
    </section>
@endsection
@extends('components.footer')
