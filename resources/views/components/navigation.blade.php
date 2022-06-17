<nav class="navbar navbar-dark bg-dark justify-content-between">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <a class="btn btn-small btn-success mr-sm-3" href="{{ URL::to('adresse/create') }}">+Neu</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <a class="btn btn-small btn-info" href="{{ URL::to('/users') }}">Startseite</a>
      </div>
    </div>
  </div>
    <form class="form-inline">
        <button class="btn btn-danger mr-sm-1" href="{{ URL::to('/') }}" type="submit">Abmelden</button>
    </form>
</nav>
