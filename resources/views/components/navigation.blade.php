<nav class="navbar navbar-dark bg-dark justify-content-between">
  @if(session()->has('username'))
    <div class="row">
            <form class="form-inline">
                @if(Request::is('users'))
                <a class="btn btn-small btn-success ml-sm-3" href="{{ URL::to('users/create') }}">+Neu Xentral Mitarbeiter</a>
                @endif
                <a class="btn btn-small btn-info mr-sm-3 ml-sm-3" href="{{ URL::to('/users') }}">Startseite</a>
                @if(Request::is('users'))
                <a class="btn btn-small btn-warning" href="{{ URL::to('/users/setting') }}">Einstellungen</a>
                @endif
            </form>
    </div>
    <form class="form-inline">
      <div class="form-group mr-sm-3" style="color:#D7D7D7">
           <p><strong>{{ session('username') }}</strong></p>
     </div>
        <a class="btn btn-danger mr-sm-3" href="{{ url('users/logout') }}">Abmelden</a>
        @if(Request::is('users/setting'))
        <a class="btn btn-info mr-sm-3" href="{{ url('/register') }}">+Neu Admin registrieren</a>
        @endif
    </form>
    @else
    <form class="form-inline">
        <a class="btn btn-info ml-sm-3" href="{{ url('/login') }}">Anmelden</a>
    </form>
    @endif
</nav>
