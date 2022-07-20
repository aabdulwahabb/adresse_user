@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('/users/setting/admin') }}">
        @csrf
        @method('PUT')
        <div class="container">
            @extends('components.navigation')
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="col-md-8 col-sm-8 col-xs-12 mt-3 mb-3">
                        <h2>Bearbeite Admin: {{ $admin->name }}</h2>
                    </div>
                    <input type="hidden" name="admin_id" id="admin_id" value="{{$admin->id}}">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $admin->name }}" required autocomplete="name" autofocus>
                                    <small class="form-text text-muted">Vor und Nachname bitte <span class="text-rigt text-danger"
                                                                                                     style="font-size:17px">*</span></small>

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
                                           value="{{ $admin->email }}" required autocomplete="email">
                                    <small class="form-text text-muted">Bitte gültige Email <span class="text-rigt text-danger"
                                                                                                  style="font-size:17px">*</span></small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Benutzername') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ $admin->username }}" required autocomplete="username" autofocus>
                                    <small class="form-text text-muted">Bitte klein Buchstaben benutzen <span
                                            class="text-rigt text-danger" style="font-size:17px">*</span></small>

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
                                           value="{{ $admin->passwordhash }}"
                                           required autocomplete="new-password">
                                    <small class="form-text text-muted">Bitte Mindestens 8 Zeichen vergeben <span
                                            class="text-rigt text-danger" style="font-size:17px">*</span></small>

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
                                           value="{{ $admin->passwordhash }}"
                                           required autocomplete="new-password">
                                    <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password <span
                                            class="text-rigt text-danger" style="font-size:17px">*</span></small>
                                    <p class="text-right"><i class="bi bi-eye-slash" id="eyeChangeId" onclick="eyeEnableOrDisable()"></i>
                                    </p>

                                    @error('repassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Update Button -->
                            <div class="row position-bottom" style="position: relative; bottom: 0px; width: 100%; margin-top: 30px; margin-left: 200px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a class="form-control btn btn-small btn-danger"
                                           href="{{ url('/users/setting')}}"><i class="fa fa-btn"></i>Abbrechen</a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-small btn-success">
                                            Speichern
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Update Button -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@extends('components.footer')
