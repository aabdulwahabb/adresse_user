<!-- resources/views/adresse/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <h1>Bearbeite
            User {{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h1>
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
            @csrf

            <input type="hidden" name="id" value="{{$user->adresse}}">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                <label>Type:</label>
                    <select class="form-control" name="typ" id="typ" required>
                        <option class="form-control" value="{{ old('typ') }}">Bitte wählen Sie Ihr Kontotype aus
                        </option>
                        <option name="typ" value="frau">Frau</option>
                        <option name="typ" value="herr">Herr</option>
                    </select>
                    <small class="form-text text-muted">z.B. Frau oder Herr</small>
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Vollständige Name</label>
                    <input type="text" name="name" id="name" required placeholder="Ihr Name"
                           class="form-control"
                           value="{{\Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name')}}">
                    <small class="form-text text-muted">Vor und Nachname</small>
                    @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email-Adresse:</label>
                    <input type="email" name="email" id="email" required placeholder="Email Adresse"
                           class="form-control" value="{{\Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('email')}}">
                    <small class="form-text text-muted">Bitte gültige Email</small>
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Telefon:</label>
                    <input type="text" name="telefon" id="telefon" placeholder="Optional"
                           class="form-control"
                           value="{{\Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('telefon')}}">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Ansprechpartner:</label>
                    <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
                           class="form-control"
                           value="{{\Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('ansprechpartner')}}">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Ihr Team:</label>
                    <select class="form-control" name="abteilung" id="abteilung">
                        <option class="form-control"
                                value="{{\Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('abteilung')}}">
                            Bitte wählen Sie Ihr Team aus
                        </option>
                        @foreach(\App\Models\Team::get() as $team)
                            <option name="abteilung" id="abteilung">{{$team->name}}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
          </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
            @if($user->standardetikett == 25)
                    <label>Mitarbeiternummer:</label>
                    @else
                    <label>Benutzername:</label>
                    @endif
                        <input type="text" name="username" id="username" required class="form-control"
                               value="{{ $user->username }}">
                        <small class="form-text text-muted">Bitte klein Buchstaben benutzen</small>
                        @if ($errors->has('username'))
                        @if($user->standardetikett == 25)
                            <span class="error">{{ $errors->first('username') }}</span>
                            @else
                            <span class="error">{{ $errors->first('mitarbeiternummer') }}</span>
                            @endif
                        @endif
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Passwort:</label>
                            <input type="password" name="password" id="password" required class="form-control"
                                   value="{{ $user->password }}">
                            <small class="form-text text-muted">Bitte Mindestens 8 Zeichen vergeben</small>
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Passwort wiederholen:</label>
                            <input type="password" name="repassword" id="repassword" required class="form-control"
                                   value="{{ $user->repassword }}">
                            <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password</small>
                            @if ($errors->has('repassword'))
                                <span class="error">{{ $errors->first('repassword') }}</span>
                            @endif
                        </div>
                    </div>
                  </div>
                    <!-- Update Button -->
              <div class="form-group"></div>
                  <div class="row ml-sm-5">
                      <div class="col-md-3">
                          <button type="submit" class="form-control btn btn-small btn-success mr-sm-5">
                             <i class="fa fa-btn fa-plus"></i>Speichern</button>
                      </div>
                      <div class="col-md-3">
                        <a class="form-control btn btn-small btn-danger"
                        href="{{ URL::to('/users') }}"><i class="fa fa-btn fa-plus"></i>Abbrechen ohne speichern</a>
                    </div>
                  </div>
        </form>
  </section>
@endsection
@extends('components.footer')
