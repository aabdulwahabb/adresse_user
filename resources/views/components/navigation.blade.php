<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('adresse/create') }}">Adresse & User anlegen</a>
        <li><a href="{{ URL::to('adresse/') }}">Alle Adresse</a>
        <li><a href="{{ URL::to('users/') }}">Alle Users</a>
        <li><a href="{{ URL::to('projekte/') }}">Alle Projekte</a>
   <li><form class="form-group" action="/">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-plus"></i>Logout
                </button>
            </div>
        </form>
    </ul>
</nav>
