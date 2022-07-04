<form action="{{ url('/users') }}" method="POST" class="form-horizontal">
    @csrf
    @method('PUT')
    <input type="hidden" name="adresse_id" id="adresse_id" value="{{$user->adresse}}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Type:</label>
                <select class="form-control" name="typ" id="typ" required>
                    <option class="form-control"
                            value="{{\App\Models\Adresse::where('id',$user->adresse)->value('typ')}}">
                        Bitte wählen Sie Ihr Kontotype aus
                    </option>
                    <option name="typ" value="frau">Frau</option>
                    <option name="typ" value="herr">Herr</option>
                </select>
                <small class="form-text text-muted">z.B. Frau oder Herr <span class="text-rigt text-danger"
                                                                              style="font-size:17px">*</span></small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Vollständige Name</label>
                <input type="text" name="name" id="name" required placeholder="Name"
                       class="form-control"
                       value="{{App\Models\Adresse::where('id',$user->adresse)->value('name')}}">
                <small class="form-text text-muted">Vor und Nachname <span class="text-rigt text-danger"
                                                                           style="font-size:17px">*</span></small>
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" required placeholder="Email Adresse"
                       class="form-control"
                       value="{{\App\Models\Adresse::where('id',$user->adresse)->value('email')}}">
                <small class="form-text text-muted">Bitte gültige Email <span class="text-rigt text-danger"
                                                                              style="font-size:17px">*</span></small>
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
                       value="{{\App\Models\Adresse::where('id',$user->adresse)->value('telefon')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Ansprechpartner:</label>
                <input type="text" name="ansprechpartner" id="ansprechpartner" placeholder="Optional"
                       class="form-control"
                       value="{{\App\Models\Adresse::where('id',$user->adresse)->value('ansprechpartner')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Team:</label>
                <select class="form-control" name="abteilung" id="abteilung">
                    <option class="form-control"
                            value="{{\App\Models\Adresse::where('id',$user->adresse)->value('abteilung')}}">
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

    <div class="row">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1"
                       value="{{\App\Models\Adresse::where('id',$user->adresse)->value('freifeld1')}}"
                       checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    <p>Intern
                        <small class="form-text text-muted">z.B. wenn direkt durch versandmanufaktur ist</small></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="freifeld1" id="freifeld1"
                       value="{{\App\Models\Adresse::where('id',$user->adresse)->value('freifeld1')}}"
                       checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    <p>Extern
                        <small class="form-text text-muted">z.B. wenn leiharbeiter ist</small></p>
                </label>
            </div>
        </div>
    </div>
    <br>

    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                @if($user->standardetikett == 25)
                    <label>Mitarbeiternummer:</label>
                    <input type="text" name="username" id="username" required class="form-control"
                           value="{{ $user->username }}">
                    <small class="form-text text-muted">Es wird fpr stechuhr login benötigt <span
                            class="text-rigt text-danger" style="font-size:17px">*</span></small>
                @else
                    <label>Benutzername:</label>
                    <input type="text" name="username" id="username" required class="form-control"
                           value="{{ $user->username }}">
                    <small class="form-text text-muted">Bitte klein Buchstaben benutzen <span
                            class="text-rigt text-danger" style="font-size:17px">*</span></small>
                @endif

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
                <small class="form-text text-muted">Bitte Mindestens 8 Zeichen vergeben <span
                        class="text-rigt text-danger" style="font-size:17px">*</span></small>
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
                <small class="form-text text-muted">Bitte bestätigen Sie Ihr Password <span
                        class="text-rigt text-danger" style="font-size:17px">*</span></small>
                @if ($errors->has('repassword'))
                    <span class="error">{{ $errors->first('repassword') }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- Update Button -->
    <div class="form-group"></div>
    <div class="row" style="position: absolute; bottom: 75px; width: 100%;">
        <div class="col-md-3">
            <div class="form-group">
                <a class="form-control btn btn-small btn-danger"
                   href="{{ url('/users')}}"><i class="fa fa-btn fa-plus"></i>Abbrechen ohne speichern</a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button type="submit" class="form-control btn btn-small btn-success">
                    Speichern
                </button>
            </div>
        </div>
    </div>
</form>
