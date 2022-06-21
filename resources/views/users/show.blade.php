<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        @extends('components.navigation')
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
        @endif
        @include('components.makarte')
        @endsection
        @extends('components.footer')
    </div>
