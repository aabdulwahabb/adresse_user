<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
<section class="container">
    @extends('components.navigation')
    <div class="form-group"></div><br><br>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
<h1>All the Users</h1>
<form class="form-inline">
  <input class="form-control mr-sm-1" type="search" placeholder="Suche" aria-label="Suche">
  <button class="btn btn-small btn-light mr-sm-1" type="submit">Suchen</button>
  </form>
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
                <a class="btn btn-small btn-dark" href="{{ URL::to('/users/id=' . $user->id) }}">Mitarbeiter Karte</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-dark" href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
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
