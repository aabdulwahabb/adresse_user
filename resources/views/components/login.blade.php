<!-- resources/views/components/login.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                        </div>
                    </div>
            </ul>
        </nav>
        <form action="{{ url('/login') }}" method="POST" class="form-horizontal">
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
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
@endsection
@extends('components.footer')
