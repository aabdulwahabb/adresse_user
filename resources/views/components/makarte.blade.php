<br><br><br><br><br><br><br><br>
<div class="form-group"></div>
<br><br>
<div class="card border-dark mb-5" style="max-width:25rem; margin-left: 31%;
    margin-right: 18%;">
    <div class="card-header">Mitarbeiter Karte</div>
    <div class="card-body text-dark">
        <h5 class="card-title">{{ \App\Models\Adresse::where('id',$user->adresse)->value('name') }}</h5>
        <p class="card-text">
            <strong>Username: </strong> {{ \App\Models\XentralUser::where('adresse',$user->adresse)->whereNot('standardetikett',25)->value('username') }}
            <br>
            <strong>Password: </strong> {{ $user->password }}<br>
            <strong>Type: </strong>{{ $user->type }} User <br>
            <strong>Mitarbeiternummer: </strong> {{ \App\Models\XentralUser::where('adresse',$user->adresse)->where('standardetikett',25)->value('username') }}
            <br>
            <strong>Team: </strong>{{ \App\Models\Adresse::where('id',$user->adresse)->value('abteilung') }}
            <br>
            <strong>Dienstleister: </strong>{{ \App\Models\Adresse::where('id',$user->adresse)->value('freifeld1')}}
            User <br>
        </p>
    </div>
</div>
<div class="row" style="position: relative; bottom: 0px; width: 100%; margin-left: 415px;">
    <a type="button" class="btn btn-small btn-info mr-sm-3"
       href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
    <a type="button" href="{{ url('/users') }}" class="btn btn-small btn-warning ml-sm-3">Abschließen</a>


</div>
