<nav class="navbar navbar-dark bg-dark justify-content-between">
    <form class="text-center">
        <a class="btn btn-small btn-success mr-sm-3 ml-sm-3" href="{{ URL::to('adresse/create') }}">+Neu</a>
        <a class="btn btn-small btn-info" href="{{ URL::to('/users') }}" style="float: right">Startseite</a>
    </form>
    <form class="form-inline">
        <a class="btn btn-danger mr-sm-5" href="{{ URL::to('/') }}" type="submit">Abmelden</a>
        <input class="form-control mr-sm-1" type="search" placeholder="Suche" aria-label="Suche">
        <a class="btn btn-small btn-info mr-sm-1" type="submit">Suchen</a>
    </form>
</nav>
