<!-- resources/views/adresse/index.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        @extends('components.navigation')
        <h1>All Adresse</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Type</td>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($adresse as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->typ }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <!-- show the adress (uses the show method found at GET /adresse/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('/adresse/' . $value->id) }}">Show this
                            Adress</a>

                        <!-- show the adressroll (uses the show method found at GET /adresse/{id} -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('/adresserolle/adresse/' . $value->id) }}">Show
                            Rolle</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $adresse->render() !!}
    </div>
@endsection
@extends('components.footer')



