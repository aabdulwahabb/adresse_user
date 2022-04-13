<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
       <li><a href="{{ URL::to('/create') }}">Create a Adresse</a>
        <li><a href="{{ URL::to('/') }}">View All Adresse</a>
    </ul>
</nav>
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
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->username }}</td>
            <td>{{ $value->type }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('/users/' . $value->id) }}">Show this User</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/users/' . $value->id . '/edit') }}">Edit this User</a>

                <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                <form action="./users/{{$value->id }}"  onsubmit="return confirm('Are you sure to delete: {{ $value->username}}')" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash">Delete</i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {!! $users->render() !!}
</div>
@endsection
