<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;



class LoginController extends Controller
{

    public function show_login_form()
    {
      if(!session()->has('username')){

        return view('auth.login');
      }
      return redirect('/users');
    }


    public function customLogin(Request $request)
   {
      $data = $request->validate([
          "username"           =>    "required|string",
          "password"        =>    "required|alphaNum|min:8"
      ]);

     if(User::where('username',$request->username)
     ->where('password', $request->password)
     ->first())
     {
       if(User::where('is_admin', 0)->first())
       {
         return redirect('/login')->with('warning', 'Sie sind kein admin Benutzer!');
       }

         $request->session()->put('username', $data['username']);

         if(session()->has('username'))
         {
           return redirect('/users')->with('info', 'Sie haben sich erfolgreich angemeldet!');
         }

     }else{
            return redirect('/login')->with('error', 'Falsche Zugangsdaten, versuchen Sie bitte erneut!');
          }
}

   public function signOut() {

      if(session()->has('username'))
       {
         session()->pull('username');
       }
        return redirect::to('/login')->with('warning', 'Sie haben sich erfolgreich abgemeldet!');
   }
}
