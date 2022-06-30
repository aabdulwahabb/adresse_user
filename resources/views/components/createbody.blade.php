@foreach(\App\Models\XentralUser::get() as $user)
    <form action="{{ url('/users') }}" method="POST" class="form-horizontal">
        @csrf
        @endforeach
<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Type:</label>
                    <select class="form-control" name="typ" id="typ">
                        <option class="form-control" value="{{ old('typ') }}">Bitte wählen Sie Ihr Kontotype aus
                        </option>
                        <option name="typ" id="typ">Frau</option>
                        <option name="typ" id="typ">Herr</option>
                    </select>
                    <small class="form-text text-muted">z.B. Frau oder Herr <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Vollständige Name:</label>
                    <input type="text" name="name" id="name" required placeholder="Name"
                           class="form-control" value="{{ old('name') }}">
                    <small class="form-text text-muted">Vor und Nachname bitte <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
                    @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="email" required placeholder="Email Adresse"
                           class="form-control" value="{{ old('email') }}">
                    <small class="form-text text-muted">Bitte gültige Email <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
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
                           class="form-control" value="{{ old('telefon') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ansprechpartner:</label>
                    <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
                           class="form-control" value="{{ old('ansprechpartner') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Team:</label>
                    <select class="form-control" name="abteilung" id="abteilung">
                        <option class="form-control" value="{{ old('abteilung') }}">Bitte wählen Sie Ihr Team aus
                        </option>
                        @foreach(\App\Models\Team::get() as $team)
                            <option name="abteilung" id="abteilung">{{$team->name}}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1" value="intern" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    <p>Intern
                        <small class="form-text text-muted">z.B. wenn direkt durch versandmanufaktur ist</small></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1" value="extern" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                   <p>Extern
                   <small class="form-text text-muted">z.B. wenn leiharbeiter ist</small></p>
                </label>
            </div>
        </div>
      </div><br>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Benutzername:</label>
                    <input type="text" name="username" id="username" required class="form-control"
                           value="{{ old('username') }}" placeholder="Username">
                    <small class="form-text text-muted">Bitte klein Buchstaben benutzen <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
                    @if ($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Passwort:</label>
                    <input type="password" name="password" id="password" required class="form-control password-field"
                           value="{{ old('password') }}" placeholder="Password">
                    <input type="checkbox"  onclick="myFunction()"> Einblenden
                    <small class="form-text text-muted">Bitte Mindestens 8 Zeichen eingeben <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
                    @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Passwort Wiederholen:</label>
                    <input type="password" name="repassword" id="repassword" required class="form-control"
                           value="{{ old('repassword') }}" placeholder="Password Wiederholen">
                    <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password <span class="text-rigt text-danger" style="font-size:17px">*</span></small>
                    @if ($errors->has('repassword'))
                        <span class="error">{{ $errors->first('repassword') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <!-- Add Button -->
        <div class="form-group"></div>
        <div class="row ml-sm-5">
            <div class="col-md-3">
                <button type="button" class="form-control btn btn-small btn-info mr-sm-5"
                        data-toggle="modal" data-target="#demoModal">
                    Einfügen</button>
            </div>
            <div class="col-md-3">
                <a class="form-control btn btn-small btn-danger"
                   href="{{ URL::to('/users') }}"><i class="fa fa-btn fa-plus"
                   data-toggle="modal" data-target="#demoModal"></i>Abbrechen</a>
            </div>
        </div>
        <!-- Modal Example Start-->
        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demoModalLabel">Benutzer Anlegen</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>Sind alle Eingabe richtig?</strong><br>
                            <small class="form-text text-muted text-danger">Stellen Sie bitte sicher dass alle Daten vor speichern richtig sind, sonst können Sie korrigieren!</small><br>
                            <small class="form-text text-danger">Notieren bitte alle Wichtige Daten wie Benutzername und Passwort</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span aria-hidden="true">&times;</span> nein, Korrigieren</button>
                        <button type="submit" class="btn btn-success"> ja, Speichern</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Example End-->
    </form>
