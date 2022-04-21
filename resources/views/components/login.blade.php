<!-- resources/views/components/login.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-inverse">
        </nav>
        <form action="{{ url('/adresse') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
        <h1>Melden Sie sich bitte an</h1>
        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="error">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
@endsection
@extends('components.footer')
