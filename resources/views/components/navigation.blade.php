<nav class="navbar navbar-dark bg-dark justify-content-between">
  @if(session()->has('username'))
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <a class="btn btn-small btn-success mr-sm-3" href="{{ URL::to('users/create') }}">+Neu</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <a class="btn btn-small btn-info" href="{{ URL::to('/users') }}">Startseite</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <a class="btn btn-small btn-warning" href="{{ URL::to('/users/setting') }}">Einstellungen</a>
            </div>
        </div>
    </div>
    <form class="form-inline">
      <div class="form-group mr-sm-3" style="color:#D7D7D7">
           <p><strong>{{ session('username') }}</strong></p>
     </div>
        <a class="btn btn-outline-danger mr-sm-1" href="{{ url('users/logout') }}">Abmelden</a>
    </form>
    @else
    <form class="form-inline">
        <a class="btn btn-outline-info mr-sm-1" href="{{ url('/login') }}">Anmelden</a>
    </form>
    @endif
</nav>
