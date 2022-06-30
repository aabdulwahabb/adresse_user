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
                    <h2>Benutzern Einstellung</h2>
                </div>
            </div>
        </div>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info" id="flashmessage">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('status'))
            <div class="alert alert-warning" id="flashmessage">{{ Session::get('status') }}</div>
        @endif
<br><br>
<form class="form-inline" action="#">
     <div class="form-group mb-3 ml-sm-5">
       <label for="staticEmail2" class="col-md-8 col-sm-8">Nächste Mitarbeiternummer:</label>
     </div>
    <div class="col-xs-4 mb-2 mr-sm-3">
      <input type="text" class="form-control" name="nummernkreis"
      id="nummernkreis" placeholder="{letzte MA Nr. +1}">
    </div>
    <button type="button" class="btn btn-success mb-2"data-toggle="modal" data-target="#demoModal">Nummernkreis bearbeiten</button>

    <!-- Modal Example Start-->
    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Xentral Mitarbeiternummer Nummernkreis</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Sind alle Änderungen richtig?</strong><br>
                        <small class="form-text text-muted text-danger">Stellen Sie bitte sicher dass alle Daten vor speichern richtig sind, sonst können Sie korrigieren!</small></p>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="form-group">
                    <label>Neue Nummer:</label>
                  <input type="text" class="form-control" name="newnummer"
                  id="newnummer" placeholder="{die neue nummer}">
                </div>
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span aria-hidden="true">&times;</span> nein, Korrigieren</button>
                    <button type="submit" class="btn btn-success"> ja, Änderung speichern</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Example End-->
  </form>

     </section>
@endsection
@extends('components.footer')
