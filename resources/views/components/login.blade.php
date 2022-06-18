<!-- resources/views/components/login.blade.php -->
@extends('layouts.app')
@section('content')
    <section class="container">
      <div class="form-group"></div><br>
        <h1>Melden Sie sich bitte an</h1>
        <!-- if there are creation errors, they will show here -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/adresse') }}" method="POST" class="form-horizontal">
          @csrf
 <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label>Benutzername</label>
            <input type="text" name="login" id="login" required placeholder="Benutzername">
            <small class="form-text text-muted">Geben Sie bitte Ihre benutzername ein</small>
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('login') }}</span>
            @endif
        </div>
    </div>
  </div>
  <div class="row">
     <div class="col-md-5">
       <div class="form-group">
         <label>Password</label>
             <input type="password" name="password" id="password" required placeholder="Passwort">
             <small class="form-text text-muted">Geben Sie bitte Ihr Passwort ein</small>
             @if ($errors->has('password'))
                 <span class="error">{{ $errors->first('password') }}</span>
             @endif
         </div>
     </div>
   </div>
   <div class="form-group"></div>
       <div class="row ml-sm-5">
           <div class="col-md-3">
        <button type="submit" class="form-control btn btn-small btn-info mr-sm-5">Login</button>
        </div>
      </div>
   </form>
</section>
@endsection
@extends('components.footer')
