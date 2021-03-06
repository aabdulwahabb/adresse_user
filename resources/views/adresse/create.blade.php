<!-- resources/views/adresse/create.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
         <h1>Create Adresse, Rolle, Xentral and Stechuhr User</h1>
        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('components.createbody')
    </section>
@endsection
@extends('components.footer')
