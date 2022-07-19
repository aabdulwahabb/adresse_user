<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 mt-3 mb-3">
                    <h2>Bearbeite
                        Benutzer {{ \App\Models\Adresse::where('id',$user->adresse)->value('name') }}</h2>
                </div>
            </div>
        </div>
        <!-- if there are creation errors, they will show here -->
        @include('components.editbody')
    </section>
@endsection
@extends('components.footer')
