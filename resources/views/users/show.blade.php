<!-- resources/views/adresse/show.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @extends('components.navigation')
<h1>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name') }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Username:</strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->wherenot('standardetikett',25)->value('username') }}<br>
            <strong>Password:</strong> {{ $user->password }}<br>
            <strong>Type:</strong>{{ $user->type }} User <br>
            <strong>Mitarbeiternummer:</strong> {{ \Illuminate\Support\Facades\DB::table('user')->where('adresse',$user->adresse)->where('standardetikett',25)->value('username') }}<br>
            <strong>Team:</strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('abteilung') }}<br>
            <strong>Dienstleister:</strong>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('freifeld1')}} User <br>

        </p>
    </div>
</div>
@endsection
@extends('components.footer')
