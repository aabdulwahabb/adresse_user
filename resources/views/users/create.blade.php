<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 mt-3 mb-3">
                    <h2>Login und Stechuhr Benutzer Erstellen</h2>
                </div>
            </div>
        </div>
        <!-- if there are creation errors, they will show here -->
        @include('components.createbody')
    </section>
@endsection
@extends('components.footer')
