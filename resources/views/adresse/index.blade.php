<!-- resources/views/adresse/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/create') }}">Create a Adresse</a>
          <li><a href="{{ URL::to('users/') }}">View All Users</a>
    </ul>
</nav>
<h1>All the Adresse</h1>

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
        </tr>
    </thead>
    <tbody>
    @foreach($adresse as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->typ }}</td>
            <td>{{ $value->email }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- show the adress (uses the show method found at GET /adresse/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('/adresse/' . $value->id) }}">Show this Adress</a>

                <!-- edit this adress (uses the edit method found at GET /adresse/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/adresse/' . $value->id . '/edit') }}">Edit this Adress</a>

                <!-- delete the adress (uses the destroy method DESTROY /adresse/{id} -->
                <form action="./adresse/{{$value->id }}"  onsubmit="return confirm('Are you sure to delete: {{ $value->name}}')" method="POST">
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
  {!! $adresse->render() !!}
</div>
@endsection
