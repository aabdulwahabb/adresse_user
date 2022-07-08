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
                    <h2>Administrator Benutzern && Verwaltung Einstellungen</h2>
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
                    @elseif(\App\Models\XentralUser::where('username', $naechstemitarbeiternummer)->exists())
                       <input type="integer" class="form-control" name="nummernkreis"
                       value="{{ intval($lastnummer) +1 }}"
                              id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                    @else
                      <input type="integer" class="form-control" name="nummernkreis"
                      value="{{ $naechstemitarbeiternummer }}"
                             id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                    @endif
                    </div>
                </div>
            </div>
            <!--Tabel -->
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
                        <!-- show the user (uses the show method found at GET /users/{id} -->
                        <input type="checkbox" checked data-toggle="toggle" data-on="Admin"
                        data-off="standard" data-onstyle="success" data-offstyle="secondary">
                    </td>
                </tr>
            @endforeach
            </tbody>
            <script type="text/javascript">
                $(function () {
                    var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ url('/status') }}",
                            data: function (d) {
                                d.activ = $('#activ').val(),
                                    d.search = $('input[type="search"]').val()
                            }
                        },
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'username', name: 'username'},
                            {data: 'email', name: 'email'},
                        ]
                    });

                    $('#activ').change(function () {
                        table.draw();
                    });
                });
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
