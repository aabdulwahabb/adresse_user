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

        return view('auth.login');
    }


    public function customLogin(Request $request)
   {
       $request->validate([
           'username' => 'required',
           'password' => 'required',
       ]);

       $credentials = $request->only('username', 'password');

       $user = User::where('username', $request->username)->first();

       if (Auth::attempt($credentials)) {

         Session::flash('message', 'Erflogreich angemeldet!');
         return redirect::to('/users');
       }

       Session::flash('error', 'Zugangsdaten sind nicht gültig!');
       return redirect::to('/login');
   }

   public function signOut() {
       Session::flush();
       Auth::logout();

       Session::flash('status', 'Sie haben sich abgemeldet!');
       return redirect::to('/login');
   }
}
