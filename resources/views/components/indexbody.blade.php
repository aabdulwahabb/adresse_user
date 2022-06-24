<!-- main content -->
<div class="container" role="main">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Alle Login Benutzern</h2>
        </div>
        <form action="{{ url('/search') }}" method="POST"
              class="form-main form-inline nofloat-xs pull-right pull-left-sm ml-sm-5">
            @csrf
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 ml-sm-5">
                        <input class="form-control input-search" type="text" name="search" id="search"
                               placeholder="Suche"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 ml-sm-2">
                        <input type="submit" class="btn btn-sm btn-primary" value="suchen"/>
                    </div>
                </div>
        </form>
    </div>
</div>
