<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="btn btn-outline-success mr-sm-2" href="{{ URL::to('adresse/create') }}">+Neu</a>
    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ URL::to('/users') }}">Startseite</a>
    <form class="form-inline">
        <a class="btn btn-outline-success mr-sm-2" href="{{ URL::to('/') }}" type="submit">Abmelden</a>
        <input class="form-control mr-sm-2" type="search" placeholder="Suche" aria-label="Suche">
        <a class="btn btn-outline-success my-2 my-sm-0" type="submit">Suchen</a>
    </form>
</nav>
