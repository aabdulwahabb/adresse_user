<div class="container" role="main">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 mt-3 mb-3">
            <h2>Karte Übersicht Benutzer: {{ \App\Models\Adresse::where('id',$user->adresse)->value('name') }}</h2>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>
<div class="card border-dark mb-5" style="max-width:25rem; margin-left: 31%;
    margin-right: 18%;">
    <div class="card-header">Mitarbeiter Karte</div>
    <div class="card-body text-dark">
        <h5 class="card-title">{{ \App\Models\Adresse::where('id',$user->adresse)->value('name') }}</h5>
        <p class="card-text">
            <strong>Username: </strong> {{ \App\Models\XentralUser::where('adresse',$user->adresse)->whereNot('hwtoken',4)->value('username') }}
            <br>
            <strong>Password: </strong> <small class="form-text text-muted">Notieren Sie bitte das Passwort vorher beim Benutzer Anlegen </small>
            <strong>Type: </strong>{{ $user->type }} Benutzer <br>
            <strong>Mitarbeiternummer: </strong> {{ \App\Models\XentralUser::where('adresse',$user->adresse)->where('hwtoken',4)->value('username') }}
            <br>
            <strong>Team: </strong>{{ \App\Models\Adresse::where('id',$user->adresse)->value('abteilung') }}
            <br>
            <strong>Dienstleister: </strong>{{ \App\Models\Adresse::where('id',$user->adresse)->value('freifeld1')}}
            Mitarbeiter <br>
        </p>
    </div>
</div>
<div class="row" style="position: relative; bottom: 0px; width: 100%; margin-left: 415px;">
    <a type="button" href="{{ url('/users') }}" class="btn btn-small btn-warning mr-sm-3">Abschließen</a>
    <a type="button" class="btn btn-small btn-info"
       href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>


</div>
