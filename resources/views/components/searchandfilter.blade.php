<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
    <tr>
        <td class="th-sm text-center"><strong>Username</strong></td>
        <td class="th-sm text-center"><strong>Typ</strong></td>
        <td class="th-sm text-center"><strong>Name</strong></td>
        <td class="th-sm text-center"><strong>Active</strong></td>
        <td class="th-sm text-center"><strong>Anzahl Rechte</strong></td>
        <td class="th-sm text-center"><strong>Hardware</strong></td>
        <td class="th-sm text-center"><strong>Menü</strong></td>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{ $user->username }}</td>
            <td class="text-center">{{ $user->type }}</td>
            <td class="text-center">{{ \Illuminate\Support\Facades\DB::table('adresse')->where('id',$user->adresse)->value('name')}}</td>

            <td class="text-center">{{ $user->activ == 1 ? 'ja' : 'nein' }} </td>

            <td class="text-center">{{ \Illuminate\Support\Facades\DB::table('userrights')->where('user',$user->id)->count('id') }}</td>
            @if($user->standardetikett == 25)
                <td class="text-center">Zeiterfassung</td>
            @else
                <td class="text-center"></td>
            @endif
            <!-- we will also add show, and delete buttons -->
            <td class="text-center">
                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/users/id=' . $user->id) }}">Mitarbeiter
                    Karte</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-warning"
                   href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
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
                {data: 'username', name: 'username'},
                {data: 'type', name: 'type'},
                {data: 'name', name: 'name'},
                {data: 'activ', name: 'activ'},
            ]
        });

        $('#activ').change(function(){
            table.draw();
        });

      });
    </script>

</table>