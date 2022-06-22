<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <br>
        <!-- Titel and Search Imput -->
            @include('components.indexbody')
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-warning" id="flashmessage">{{ Session::get('status') }}</div>
        @endif

        @include('components.searchandfilter')
    </section>
    {{ $users}}
@endsection
@extends('components.footer')
