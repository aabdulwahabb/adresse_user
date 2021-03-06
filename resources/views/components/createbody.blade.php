<form action="{{ url('/users') }}" method="POST" class="form-horizontal">
    @csrf
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
                <small class="form-text text-muted">z.B. Frau oder Herr <span class="text-rigt text-danger"
                                                                              style="font-size:17px">*</span></small>
                @error('Type')
                <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Vollständige Name:</label>
                <input type="text" name="name" id="name" required placeholder="Name"
                       class="form-control" value="{{ old('name') }}">
                <small class="form-text text-muted">Vor und Nachname bitte <span class="text-rigt text-danger"
                                                                                 style="font-size:17px">*</span></small>
                @error('Name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" required placeholder="Email Adresse"
                       class="form-control" value="{{ old('email') }}">
                <small class="form-text text-muted">Bitte gültige Email <span class="text-rigt text-danger"
                                                                              style="font-size:17px">*</span></small>
                @error('Email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1" value="intern" checked>
            <label class="form-check-label" for="exampleRadios1">
                <p>Intern
                    <small class="form-text text-muted">Vertragtyp z.B. wenn direkt durch versandmanufaktur ist</small>
                </p>
            </label>
        </div>
        <!-- Material inline 2 -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1" value="extern">
            <label class="form-check-label" for="exampleRadios2">
                <p>Extern
                    <small class="form-text text-muted">Vertragtyp z.B. wenn leiharbeiter ist</small></p>
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Telefon:</label>
                <input type="text" name="telefon" id="telefon" placeholder="Optional"
                       class="form-control" value="{{ old('telefon') }}">
                @error('Telefon')
                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Ansprechpartner:</label>
                <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
                       class="form-control" value="{{ old('ansprechpartner') }}">
                <small class="form-text text-muted">z.B. zuständiger Ansprechpartner der Leihfirma</small>
                @error('Ansprechpartner')
                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                @enderror
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
                @error('Team')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Benutzername:</label>
                <input type="text" name="username" id="username" required class="form-control"
                       value="{{ old('username') }}" placeholder="Username">
                <small class="form-text text-muted">Bitte klein Buchstaben benutzen <span
                        class="text-rigt text-danger" style="font-size:17px">*</span></small>
                @error('Benutzername')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Passwort:</label>
                <input type="password" name="password" id="password" required class="form-control password-field"
                       value="{{ old('password') }}" placeholder="Password">
                <small class="form-text text-muted">Bitte Mindestens 8 Zeichen eingeben <span
                        class="text-rigt text-danger" style="font-size:17px">*</span></small>

                @error('Passwort')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Passwort Wiederholen:</label>
                <input type="password" name="repassword" id="repassword" required class="form-control"
                       value="{{ old('repassword') }}" placeholder="Password Wiederholen">
                <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password <span
                        class="text-rigt text-danger" style="font-size:17px">*</span></small>
                <p class="text-right"><i class="bi bi-eye-slash" id="eyeChangeId" onclick="eyeEnableOrDisable()"></i>
                </p>
                @error('Passwortbestätigung')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Add Button -->
    <br><br><br><br><br><br><br><br>
    <div class="row position-bottom" style="position: relative; bottom: 0px; width: 100%;">
        <div class="col-md-2">
            <div class="form-group">
                <a class="form-control btn btn-small btn-danger"
                   href="{{ url('/users') }}"><i class="fa fa-btn"
                                                 data-toggle="modal" data-target="#demoModal"></i>Abbrechen</a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button type="button" class="form-control btn btn-small btn-info mr-sm-5"
                        data-toggle="modal" data-target="#demoModal">
                    Einfügen
                </button>
            </div>
        </div>
    </div>
    <!-- Modal Example Start-->
    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Benutzer Anlegen</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Sind alle Eingabe richtig?</strong><br>
                        <small class="form-text text-muted text-danger">Stellen Sie bitte sicher dass alle Daten
                            vor speichern richtig sind, sonst können Sie korrigieren!</small><br>
                        <small class="form-text text-danger">Notieren bitte alle Wichtige Daten wie Benutzername
                            und Passwort</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span>
                        Abbrechen
                    </button>
                    <button type="submit" class="btn btn-info">Speichern</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Example End-->
</form>
