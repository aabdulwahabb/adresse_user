<table id="dtBasicExample" class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <td class="th-sm text-center"><strong>Benutzername</strong></td>
        <td class="th-sm text-center"><strong>Typ</strong></td>
        <td class="th-sm text-center"><strong>Name</strong></td>
        <td class="th-sm text-center"><strong>Aktiv</strong></td>
        <td class="th-sm text-center"><strong>Anzahl Rechte</strong></td>
        <td class="th-sm text-center"><strong>Stechuhr</strong></td>
        <td class="th-sm text-center"><strong>Menü</strong></td>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{ $user->username }}</td>
            <td class="text-center">{{ $user->type }}</td>
            <td class="text-center">{{ \App\Models\Adresse::where('id',$user->adresse)->value('name')}}</td>

            <td class="text-center">
              <input data-id="{{$user->id}}" class="toggle-class" type="checkbox"
              data-onstyle="success" data-offstyle="secondary" data-toggle="toggle"
              data-on="ja" data-off="nein" {{ $user->activ ? 'checked' : '' }}>
            </td>
            @if($user->type == 'admin')
                <td class="text-center">alle</td>
            @else
            <td class="text-center">{{ \App\Models\UserRight::where('user',$user->id)->count('id') }}</td>
            @endif
            @if($user->hwtoken == 4)
                <td class="text-center">Zeiterfassung</td>
            @else
                <td class="text-center"></td>
            @endif
            <!-- we will also add show, and delete buttons -->
            <td class="text-center">
                @if($user->hwtoken != 4)
                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-info" href="{{ URL::to('/users/id=' . $user->id) }}">Anzeigen</a>
                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-warning" href="{{ URL::to('users/id=' . $user->id . '/edit') }}">Bearbeiten</a>
                @endif
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

            $('#activ').change(function () {
                table.draw();
            });

        });
    </script>

</table>
