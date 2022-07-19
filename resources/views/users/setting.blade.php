@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 mt-3">
                    <h2>Administrator Benutzern && Einstellungen</h2>
                </div>
            </div>
        </div>
        <br>
        <!-- Tittle and Input -->
        <form action="{{ url('/users/setting') }}" method="POST" class="form-horizontal">
          @csrf
          @method('PUT')

          <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <h4>Nummernkreis Setzen</h4>
              </div>
                <div class="col-md-4">
                    <div class="form-group">
                    @if ($naechstemitarbeiternummer == $lastnummer || empty($naechstemitarbeiternummer))
                        <input type="integer" class="form-control" name="nummernkreis"
                        value="{{ intval($lastnummer) +1 }}"
                               id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                               <small class="form-text text-muted">soll die nächste Zeiterfassung Benutzername/Mitarbeiternummer sein</small>
                    @elseif(\App\Models\XentralUser::where('username', $naechstemitarbeiternummer)->exists())
                       <input type="integer" class="form-control" name="nummernkreis"
                       value="{{ intval($lastnummer) +1 }}"
                              id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                              <small class="form-text text-muted">soll die nächste Zeiterfassung Benutzername/Mitarbeiternummer sein</small>
                    @else
                      <input type="integer" class="form-control" name="nummernkreis"
                      value="{{ $naechstemitarbeiternummer }}"
                             id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                             <small class="form-text text-muted">Soll die nächste Zeiterfassung Benutzername/Mitarbeiternummer sein.</small>
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
                <td class="th-sm text-center"><strong>Admin</strong></td>
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
                        <input data-id="{{$adminuser->id}}" class="toggle-class" type="checkbox"
                               data-onstyle="success" data-offstyle="secondary" data-toggle="toggle"
                               data-on="ja" data-off="nein" {{ $adminuser->is_admin ? 'checked' : '' }}>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <!-- Admin Status ändern -->
            <script>
                $(document).ready(function(){
                    $('.toggle-class').change(function () {
                        let admin = $(this).prop('checked') === true ? 1 : 0;
                        let adminId = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "{{ url('/users/setting/admin/status') }}",
                            data: {'admin': admin, 'admin_id': adminId},
                            success: function (data) {
                                console.log(data.message);
                            }
                        });
                    });
                });
            </script>
        </table>
        <!-- Update Button -->
        <div class="row position-bottom" style="position: relative; bottom: 0px; width: 100%;">
            <div class="col-md-2">
                <div class="form-group">
                    <a class="form-control btn btn-small btn-danger"
                       href="{{ url('/users')}}"><i class="fa fa-btn"></i>Abbrechen</a>
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
