<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>Bearbeite User {{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h1>
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
<form action="{{ url('/users') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('patch')}}
    <div class="form-group">
        <label class="formGroupExampleInput">Username:</label>
        <input type="text" name="username" id="username" required class="form-control" value="{{ $user->username }}">
        @if ($errors->has('username'))
            <span class="error">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label class="formGroupExampleInput">Password:</label>
        <input type="password" name="password" id="password" required class="form-control" value="{{ $user->password }}">
        <small class="form-text text-muted">Mindestens 8 Zeichen</small>
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group">
</div>
<!-- Update Button -->
 <div class="form-group">
     <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-small btn-success">
             <i class="fa fa-btn fa-plus">update</i>
         </button>
     </div>
 </div>
</form>
</div>
@endsection
@extends('components.footer')
