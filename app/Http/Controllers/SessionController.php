<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\XentralUser;

class SessionController extends Controller
{

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function index()
      {
          return view('auth.login');
      }

      /**
    * Write code on Method
    *
    * @return response()
    */
   public function registration()
   {
       return view('auth.register');
   }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function login(Request $request)
      {
          $request->validate([
              'username' => 'required',
              'password' => 'required',
          ]);

          $credentials = $request->only('username', 'password');
          if (Auth::attempt($credentials)) {
              return redirect()->intended('/users')
                          ->withSuccess('Sie habe sich erlfolgreich angemeldet');
          }

          return redirect("login")->withSuccess('Oppes! Sie haben ungültige Zugangsdaten!');
      }

/*
      /**
    * Write code on Method
    *
    * @return response()
    */
   public function register(Request $request)
   {
       $request->validate([
           'username' => 'required',
           'password' => 'required|min:6',
       ]);

       $data = $request->all();
       $check = $this->create($data);

       return redirect("/users")->withSuccess('Sie habe sich erlfolgreich angemeldet');
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
   public function startseite()
   {
       if(Auth::check()){
           return view('users.index');
       }

       return redirect("/login")->withSuccess('Opps! Sie haben kein Zugriff!');
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
   public function create(array $data)
   {
     return XentralUser::create([
       'username' => $data['username'],
       'password' => Hash::make($data['password'])
     ]);
   }

   /**
    * Write code on Method
    *
    * @return response()
    */
   public function logout() {
       Session::flush();
       Auth::logout();

       return Redirect('/login');
   }
}
