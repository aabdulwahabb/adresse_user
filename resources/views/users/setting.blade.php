@extends('layouts.app')
@section('content')
    <section class="container">
        @extends('components.navigation')
        <div class="form-group"></div>
        <br>
        <!-- Titel and Search Imput -->
        <!-- main content -->
        <div class="container" role="main">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2>Verwaltung Einstellungen</h2>
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
        @if (Session::has('success'))
            <div class="alert alert-success" id="flashmessage">
              <button type="button" class="close" data-dismiss="alert">
              x</button>
              <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <br><br>
        <!-- Tittle and Input -->
        <form action="{{ url('/users/setting') }}" method="POST" class="form-horizontal">
          @csrf
          @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="staticEmail2" class="col-md-8 col-sm-8">Nächste Mitarbeiternummer:</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nummernkreis" value="{{ intval($lastmanummer->username) +1 }}"
                               id="nummernkreis" placeholder="{letzte MA Nr. +1}">
                    </div>
                </div>
            </div>
            <!-- Tittle and Input -->

            <!-- Update Button -->
            <div class="row" style="position: absolute; bottom: 50px; width: 100%;">
                <div class="col-md-3">
                    <div class="form-group">
                        <a class="form-control btn btn-small btn-danger"
                           href="{{ url('/users')}}"><i class="fa fa-btn fa-plus"></i>Abbrechen ohne speichern</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-small btn-success">
                            Speichern
                        </button>
                    </div>
                </div>
            </div>
            <!-- Update Button -->
        </form>

    </section>
@endsection
@extends('components.footer')
