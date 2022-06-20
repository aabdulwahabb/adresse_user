<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
    @endif
    <br><br><br><br><br><br><br><br>
    <div class="form-group"></div><br><br>
    <div class="card border-dark mb-5" style="max-width:25rem; margin-left: 31%;
    margin-right: 18%;">
  <div class="card-header">Mitarbeiter Karte</div>
  <div class="card-body text-dark">
<h5 class="card-title">{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h5>
        <p class="card-text">
            <strong>Username:</strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->wherenot('standardetikett',25)->value('username') }}<br>
            <strong>Password:</strong> {{ $user->password }}<br>
            <strong>Type:</strong>{{ $user->type }} User <br>
            <strong>Mitarbeiternummer:</strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->where('standardetikett',25)->value('username') }}<br>
            <strong>Team:</strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('abteilung') }}<br>
            <strong>Dienstleister:</strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('freifeld1')}} User <br>

        </p>
    </div>
    </div>
      <div class="text-center">
        <a class="btn btn-small btn-info mr-sm-3" href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
        <a class="btn btn-danger ml-sm-3" href="{{ URL::to('/users') }}">Abbrechen</a>
      </div>
@endsection
@extends('components.footer')


<script>
setTimeout(function () {
        $("#flashmessage").hide();
    }, 5000);

  </script>
