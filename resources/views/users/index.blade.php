<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')
@section('content')

@if(isset(Auth::user()->username))
<div class="alert alert-danger alert-block">
  <strong>Willkommen {{ Auth::user()->username }}</strong>
</div>
else
  <script> window.location = "/login"; </script>
@endif

    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <br>
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2>Angelegte Benutzern</h2>
                </div>
            </div>
        </div>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">
              <button type="button" class="close" data-dismiss="alert">
              x</button>
              <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-warning" id="flashmessage">
              <button type="button" class="close" data-dismiss="alert">
              x</button>
              <strong>{{ Session::get('status') }}</strong>
            </div>
        @endif

        @include('components.searchandfilter')
    </section>
@endsection
@extends('components.footer')
