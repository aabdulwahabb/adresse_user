@extends('layouts.app')

@section('content')
 <form method="POST" action="{{ url('/users/register') }}">
        @csrf
    <div class="container">
        @extends('components.navigation')
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="col-md-8 col-sm-8 col-xs-12 mt-3">
                    <h2>{{ __('Neue Admin People Verwaltung Anlegen') }}</h2>
                </div>

                <div class="card mt-5">
                    <div class="card-body">

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Die neue People Team Mitarbeitername') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Die neue Benutzername') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="repassword"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Passwordsbestätigen') }}</label>

                                <div class="col-md-6">
                                    <input id="repassword" type="password"
                                           class="form-control @error('repassword') is-invalid @enderror" name="repassword"
                                           required autocomplete="new-password">
                                    <p class="text-right"><i id="eyeChangeId" class="bi bi-eye-slash" onclick="eyeEnableOrDisable()"></i></p>

                                    @error('repassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- Password && Repassword Ein und ausblenden -->
    <script>
        //Javascript function definition
        function eyeEnableOrDisable()
        {
            //getting type of the password field element by jQuery
            var x = $('#password').prop("type");
            var y = $('#repassword').prop("type");
            if (x === "password" && y === "password")
            {
                //changing input type text
                $('#password').prop("type", "text");
                $('#repassword').prop("type", "text");
                //removing fa-eye class
                $('#eyeChangeId').removeClass('fa-eye');
                //adding fa-eye-slash class
                $('#eyeChangeId').addClass('fa-eye-slash');
            }
            else
            {
                //changing type passord
                $('#password').prop("type", "password");
                $('#repassword').prop("type", "password");
                //removinf fa-eye-slash class
                $('#eyeChangeId').removeClass('fa-eye-slash');
                //adding fa-eye class
                $('#eyeChangeId').addClass('fa-eye');
            }
        }
    </script>
@endsection
@extends('components.footer')
