<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\XentralUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function show_register_form()
    {
        if (session()->has('username')) {
        return view('auth.register');
        }
        Session::flash('warning', 'Sie dürfen die Seite nicht zugreifen!');
        return redirect::to('/login');
    }

    public function customRegister(Request $request)
    {
        if (session()->has('username')) {
        // validate adresse
        $this->validate($request, [
            'name' => 'required|string|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
            'email' => 'required|string|max:255|unique:users',
            'username' => 'required|string|regex:/^\S*$/u|max:255|unique:users',
            'password' => 'required|string|min:8',
            'repassword' => 'required|min:8|same:password',
        ]);

        // store adresse
        $neuadresse = new User([
            'name' => $request->get('name'),
            'email' => strtolower($request->get('email')),
            'username' => strtolower($request->get('username')),
            'password' => Hash::make($request->get('password')),
            'repassword' => Hash::make($request->get('repassword')),
            'remember_token' => Hash::make($request->get('password')),
            'is_admin' => 1,
        ]);
        $neuadresse->save();


                return redirect('/users')->with('info', 'Neue Admin wurde erfolgreich registriert!');
            }
        return redirect('/register')->with('error', 'Sie dürfen die Seite nicht zugreifen!');
    }


    public function customLogin(Request $request)
   {
      $data = $request->validate([
          'username' => 'required|string|regex:/^\S*$/u|max:255|unique:user',
          "password"        =>    "required|alphaNum|min:8"
      ]);

     if(User::where('username',$request->username)
     ->where('password', $request->password)
     ->where('is_admin', 1)
     ->first())
     {
         $request->session()->put('username', $data['username']);
         if(session()->has('username'))
         {
           return redirect('/users')->with('info', 'Sie haben sich erfolgreich angemeldet!');
         }

     }elseif(User::where('username',$request->username)
         ->where('password', $request->password)
         ->where('is_admin', 0)
         ->first()){
            return redirect('/login')->with('error', 'Sie Sind kein Admin User!');
          }
         return redirect('/login')->with('error', 'Falsche Zugangsdaten, versuchen Sie bitte erneut!');
}

   public function signOut() {

      if(session()->has('username'))
       {
         session()->pull('username');
       }
        return redirect::to('/login')->with('warning', 'Sie haben sich erfolgreich abgemeldet!');
   }
}
