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
     $data = $request->input();
     $request->session()->put('username', $data['username']);

     if(session()->has('username'))
     {
       return redirect('/users')->with('message', 'Sie haben sich erfolgreich angemeldet!');
     }
     return view('auth.login');
      /* $request->validate([
           'username' => 'required|string',
           'password' => 'required|alphaNum|min:8',
       ]);

       $credentials = $request->only('username', 'password');

       $user = User::where('username', $request->username)->first();

       if (Auth::attempt($credentials)) {

         return redirect::to('/users')->with('message', 'Erflogreich angemeldet!');
       }

       return redirect::to('/login')->with('error', 'Zugangsdaten sind nicht gültig!');
       */
   }

   public function signOut() {

      if(session()->has('username'))
       {
         session()->pull('username');
       }
        return redirect::to('/login')->with('status', 'Sie haben sich abgemeldet!');
   }
}
