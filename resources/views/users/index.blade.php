<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 mt-3">
                    <h2>Angelegte Benutzer</h2>
                    <div>
                        <h5 class="form-text text-muted ml-sm-3">Hier werden alle Xentral Benutzer aufgelistet.
                            <small class="form-text text-muted">Benutzer "aktivieren/deaktivieren" auf Knopf "ja/nein" klicken</small></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- will be used to show any messages -->
        @include('components.searchandfilter')
    </section>
@endsection
@extends('components.footer')
