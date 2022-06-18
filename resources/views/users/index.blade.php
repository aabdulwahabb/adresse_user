<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
<section class="container">
    @extends('components.navigation')
    <div class="form-group"></div><br>
    <!-- main content -->
    <div class="container" role="main">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <h2>Alle Login Benutzern</h2>
          </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
               <form action="" method="GET" class="form-main  form-inline nofloat-xs pull-right pull-left-sm">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <label class="sr-only" for="search">Suche</label>
                    <div class="input-group">
                        <input type="text" class="form-control input-search" name="search" id="search" placeholder="Suche">
                        <span class="input-group-addon group-icon"><span class="glyphicon glyphicon-user"></span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span><span class="hidden-sm hidden-xs">Suchen</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
@endif

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <tr>
            <td class="th-sm"><strong>Username</strong></td>
            <td class="th-sm"><strong>Typ</strong></td>
            <td class="th-sm"><strong>Name</strong></td>

            <td class="th-sm"><strong>
                <a class="btn btn-secondary dropdown-toggle"
                   href="#" role="button" id="activ" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Aktiv
                </a>
                <p class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" type="submit" href="/users" id="activ">ja</a>
                        <a class="dropdown-item" type="submit" href="/users" id="activ">nein</a>
                </p>
                </strong></td>

            <td class="th-sm"><strong>Anzahl Rechte</strong></td>
            <td class="th-sm"><strong>Hardware</strong></td>
            <td class="th-sm"><strong>Menü</strong></td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name')}}</td>

            @if($user->activ == 1)
                <td>ja</td>
            @elseif($user->activ == 0)
                <td>nein</td>
            @endif

            <td>{{ \Illuminate\Support\Facades\DB::table('userrights')->where('user',$user->id)->count('id') }}</td>
            @if($user->standardetikett == 25)
            <td>Zeiterfassung</td>
            @else
            <td></td>
            @endif
            <!-- we will also add show, and delete buttons -->
            <td>
                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/users/id=' . $user->id) }}">Mitarbeiter Karte</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-warning" href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</section>
    {!! $users->links() !!}
@endsection
@extends('components.footer')



<script>
setTimeout(function () {
        $("#flashmessage").hide();
    }, 5000);

// Basic example
$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

  </script>
