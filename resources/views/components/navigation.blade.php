<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">

      <li><div class="form-group">
        <a class="btn btn-small btn-success" href="{{ URL::to('adresse/create') }}" style="float: left;">+Neu</a>
        <li><a href="{{ URL::to('users/') }}">Alle Users</a>
          </div>
   <li><div class="form-group">
     <a class="btn btn-small btn-danger" href="{{ URL::to('/') }}" style="float: right;">Logout</a>
   </button>
       </div>
    </ul>
</nav>
