@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <br>
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2>Administrator Benutzern && Einstellungen</h2>
                </div>
            </div>
        </div>
        <!-- will be used to show any messages -->
        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">
          x</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">
              <button type="button" class="close" data-dismiss="alert">
              x</button>
              <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-warning" id="flashmessage">
              <button type="button" class="close" data-dismiss="alert">
              x</button>
              <strong>{{ Session::get('status') }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br><br>
        <!-- Tittle and Input -->
        <form action="{{ url('/users/setting') }}" method="POST" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <h4>Nummernkreis Setzen</h4>
              </div>
          </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="staticEmail2" class="col-md-8 col-sm-8">Nächste Mitarbeiternummer:</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      @if ($naechstemitarbeiternummer == $lastnummer || empty($naechstemitarbeiternummer))
                        <input type="integer" class="form-control" name="nummernkreis"
                        value="{{ intval($lastnummer) +1 }}"
                               id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                               <small class="form-text text-muted">Nächste Zeiterfassung Benutzername/Mitarbeiternummer</small>
                    @elseif(\App\Models\XentralUser::where('username', $naechstemitarbeiternummer)->exists())
                       <input type="integer" class="form-control" name="nummernkreis"
                       value="{{ intval($lastnummer) +1 }}"
                              id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                              <small class="form-text text-muted">Nächste Zeiterfassung Benutzername/Mitarbeiternummer</small>
                    @else
                      <input type="integer" class="form-control" name="nummernkreis"
                      value="{{ $naechstemitarbeiternummer }}"
                             id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                             <small class="form-text text-muted">Nächste Zeiterfassung Benutzername/Mitarbeiternummer</small>
                    @endif
                    </div>
                </div>
            </div>
            <!--Tabel -->
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h4>Admin Benutzern</h4>
                </div>
            </div>
        <table id="dtBasicExample" class="table table-striped table-sm col-md-1">
            <thead class="thead-dark col-md-3">
            <tr>
                <td class="th-sm text-center"><strong>Name</strong></td>
                <td class="th-sm text-center"><strong>Benutzername</strong></td>
                <td class="th-sm text-center"><strong>Email</strong></td>
                <td class="th-sm text-center"><strong>Typ</strong></td>
            </tr>
            </thead>
            <tbody>
            @foreach($adminusers as $adminuser)
                <tr>
                    <td class="text-center">{{ $adminuser->name }}</td>
                    <td class="text-center">{{ $adminuser->username }}</td>
                    <td class="text-center">{{ $adminuser->email }}</td>
                    <!-- we will also add show, and admin rights -->
                    <td class="text-center">
                      <div class="form-group">
                       <div class="custom-control custom-switch">
                         <input type="checkbox" class="custom-control-input"
                         {{($adminuser->is_admin) ? 'checked' : ''}}
                         onclick="changeUserStatus(event.target, {{ $adminuser->id }});">
                         <label class="custom-control-label pointer"></label>
                      </div>
                   </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <!-- Toggle admin-->
            <script>
            function changeUserStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/change-status`,
        type: 'post',
        data: {
            _token: _token,
            id: id,
            status: status
        },
        success: function (result) {
        }
    });
}
            </script>

        </table>
        <!-- Update Button -->
        <div class="row" style="position: absolute; bottom: 50px; width: 100%;">
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
        <!-- Update Button -->
    </form>
    </section>
@endsection
@extends('components.footer')
