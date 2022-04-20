<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>All the Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Type</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->type }}</td>

            <!-- we will also add show, and delete buttons -->
            <td>
                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('/users/' . $value->id) }}">Show this User</a>

                <!-- show the user (uses the show method found at GET userrights/users/{id} -->
                <a class="btn btn-small btn-info" href="{{ URL::to('userrights/users/' . $value->id) }}">Show Userrights</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {!! $users->render() !!}
</div>
@endsection
@extends('components.footer')
