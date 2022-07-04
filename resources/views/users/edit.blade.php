<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <h1>Bearbeite
            Benutzer {{ \App\Models\Adresse::where('id',$user->adresse)->value('name') }}</h1>
        <!-- if there are creation errors, they will show here -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('components.editbody')
    </section>
@endsection
@extends('components.footer')
