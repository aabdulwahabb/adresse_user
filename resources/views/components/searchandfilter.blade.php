<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead class="thead-dark">
    <tr>
        <td class="th-sm"><strong>Username</strong></td>
        <td class="th-sm"><strong>Typ</strong></td>
        <td class="th-sm"><strong>Name</strong></td>

        <td class="th-sm">
            <strong>
                <select name="status" id="status" class="form-control custom-control">

                    <option value="">status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </strong>
        </td>

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

            <td>{{ $user->activ == 0 ? 'Inactive' : 'Active' }} </td>

            <td>{{ \Illuminate\Support\Facades\DB::table('userrights')->where('user',$user->id)->count('id') }}</td>
            @if($user->standardetikett == 25)
                <td>Zeiterfassung</td>
            @else
                <td></td>
            @endif
            <!-- we will also add show, and delete buttons -->
            <td>
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
</table>
