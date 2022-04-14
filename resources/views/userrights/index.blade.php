<!-- resources/views/adresserolle/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('/create') }}">Create a Adresse</a>
        <li><a href="{{ URL::to('/') }}">View All Adresse</a>
        <li><a href="{{ URL::to('users/') }}">View All Users</a>
    </ul>
</nav>
        <h1>Showing Userrights by: {{ $user->username }}</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Username</td>
            <td>Module</td>
            <td>Activity</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($userrights as $key => $value)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $value->module }}</td>
            <td>{{ $value->action }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- edit this adresseroll (uses the edit method found at GET /userrights/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/userrights/' . $value->id . '/edit') }}">Edit this Userright</a>

                <!-- delete the adressroll (uses the destroy method DESTROY /userrights/{id} -->
                <form action="./userrights/{{$value->id }}"  onsubmit="return confirm('Are you sure to delete:{{ $value->module}}')" method="POST">
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
  {!! $userrightes->render() !!}
</div>
@endsection
