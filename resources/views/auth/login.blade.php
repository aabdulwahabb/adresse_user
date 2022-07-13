@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('/users/login') }}">
    @csrf
    <div class="container">
      @extends('components.navigation')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">{{ __('Melden Sie sich Bitte an') }}</div>

                    <div class="card-body">
                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Benutzername') }}</label>

                                <div class="col-md-8">
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

                              <div class="col-md-8">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
		                           <p class="text-right"><i id="eyeChangeId" class="bi bi-eye-slash" onclick="eyeEnableOrDisable()"></i></p>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" value="Login">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Password Ein und ausblenden -->
<script>
	//Javascript function definition
	function eyeEnableOrDisable()
	{
		//getting type of the password field element by jQuery
		var x = $('#password').prop("type");
		if (x === "password")
		{
			//changing input type text
			$('#password').prop("type", "text");
			//removing fa-eye class
			$('#eyeChangeId').removeClass('fa-eye');
			//adding fa-eye-slash class
			$('#eyeChangeId').addClass('fa-eye-slash');
		}
		else
		{
			//changing type passord
			$('#password').prop("type", "password");
			//removinf fa-eye-slash class
			$('#eyeChangeId').removeClass('fa-eye-slash');
			//adding fa-eye class
			$('#eyeChangeId').addClass('fa-eye');
		}
	}
</script>
@endsection
@extends('components.footer')
