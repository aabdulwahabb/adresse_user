<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">

      <li>
        <div class="form-group">
        <a href="{{ URL::to('adresse/create') }}" class="btn btn-small btn-success">
          <i class="fa fa-btn fa-plus"></i>
            +Neu
        <li><a href="{{ URL::to('users/') }}">Alle Users</a>
          </div>
   <li><form class="form-group" action="/">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-plus"></i>Logout
                </button>
            </div>
        </form>
    </ul>
</nav>
