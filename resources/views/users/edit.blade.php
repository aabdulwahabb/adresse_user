<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
      <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/create') }}">Create a Adresse</a>
            <li><a href="{{ URL::to('/') }}">View All Adresse</a></li>
            <li><a href="{{ URL::to('users/') }}">View All Users</a>
          </ul>
      </nav>
<h1>Edit {{ $user->username }}</h1>
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
<form action="{{ url('users') }}/{{$user->id }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH')}}
    <div class="form-group">
        <label for="formGroupExampleInput">Type:(dropdown)</label>
        <input type="text" name="type" class="form-control" value="{{ $user->type }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Username:</label>
        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Password:</label>
        <input type="password" name="password" class="form-control" value="{{ $user->password }}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Repassword:</label>
        <input type="password" name="repassword" class="form-control" value="{{ $user->repassword }}">
    </div>
    <div class="form-group">
</div>
<!-- Update Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-default">
             <i class="fa fa-btn fa-plus">update</i>
         </button>
     </div>
 </div>
</form>
</div>
@endsection
