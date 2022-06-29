<br><br><br><br><br><br><br><br>
<div class="form-group"></div>
<br><br>
<div class="card border-dark mb-5" style="max-width:25rem; margin-left: 31%;
    margin-right: 18%;">
    <div class="card-header">Mitarbeiter Karte</div>
    <div class="card-body text-dark">
        <h5 class="card-title">{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h5>
        <p class="card-text">
            <strong>Username: </strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->whereNot('standardetikett',25)->value('username') }}
            <br>
            <strong>Password: </strong> {{ $user->password }}<br>
            <strong>Type: </strong>{{ $user->type }} User <br>
            <strong>Mitarbeiternummer: </strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->where('standardetikett',25)->value('username') }}
            <br>
            <strong>Team: </strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('abteilung') }}
            <br>
            <strong>Dienstleister: </strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('freifeld1')}}
            User <br>
        </p>
    </div>
</div>
<div class="text-center">
    <a type="button" class="btn btn-small btn-info mr-sm-3"
       href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
    <a type="button" class="btn btn-small btn-warning ml-sm-3" data-toggle="modal" data-target="#demoModal">Abschließen</a>

    <!-- Modal Example Start-->
    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Benutzer Anlegen</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Sind alle Eingabe richtig?</strong><br>
                        <small class="form-text text-muted text-danger">Stellen Sie bitte sicher dass alle Daten vor speichern richtig sind, sonst können Sie korrigieren!</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span aria-hidden="true">&times;</span> nein, Korrigieren</button>
                    <a type="button" href="{{ URL::to('/users') }}" class="btn btn-primary">Ja, zurück zur Startseite</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Example End-->

</div>
