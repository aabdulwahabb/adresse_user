<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <br>
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2>Angelegte Benutzern</h2>
                </div>
            </div>
        </div>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-warning" id="flashmessage">{{ Session::get('status') }}</div>
        @endif

        @include('components.searchandfilter')
    </section>
@endsection
@extends('components.footer')
