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
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;


class LoginController extends Controller
{

    // Show Login Page
    public function show_login_form()
    {
      if(!session()->has('username')){

        return view('auth.login');
      }
      return redirect('/users');
    }

    // Show Registration Page
    public function show_register_form()
    {
        if (session()->has('username')) {
        return view('auth.register');
        }
        Session::flash('warning', 'Sie dürfen die Seite nicht zugreifen!');
        return redirect::to('/login');
    }

    // Logic register Process
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

        // store new admin
        $neuadmin = new User();
            $neuadmin->name = $request->name;
            $neuadmin->email = strtolower($request->email);
            $neuadmin->username = strtolower($request->username);
            $neuadmin->passwordhash = Hash::make($request->password);
            $neuadmin->password = '';
            $neuadmin->repassword = 0;
            $neuadmin->remember_token = Str::random(40);
            $neuadmin->passwordmd5 = Str::random(40);
            $neuadmin->passwordsha512 = Str::random(40);
            $neuadmin->salt = Str::random(40);
            $neuadmin->is_admin = 1;
            $neuadmin->email_verified_at = now();

            $neuadmin->save();

                return redirect('/users')->with('info', $request->name . ' wurde als Admin erfolgreich registriert!');
            }
        return redirect('/register')->with('error', 'Sie dürfen die Seite nicht zugreifen!');
    }

    //edit admin page
    public function editadmin($id)
    {
        $admin = User::find($id);

        if (session()->has('username')) {
            return View('auth.editadmin', compact('admin'));
        }
        Session::flash('warning', 'Sie dürfen die Seite nicht zugreifen!');
        return redirect::to('/login');
    }

    // Validate Update admin
    public function updateadmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'sometimes|string|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
            'email' => 'sometimes|string|max:255',
            'sometimes|string|regex:/^\S*$/u|max:255',
        ]);

// only if password has be changed then make the validate otherwise not validate
        $admin = User::find($request->admin_id);
        if ($request->password != $admin->passwordhash) {
            $this->validate($request, [
                'password' => 'sometimes|string|min:8',
                'repassword' => 'sometimes|same:password',
            ]);
            $admin = User::find($request->admin_id);
            $admin->passwordhash = Hash::make($request->password);
            $admin->save();
        }

// Store Update in admin users table
        $admin = User::find($request->admin_id);
        $admin->name = $request->name;
        $admin->email = strtolower($request->email);
        $admin->username = strtolower($request->username);
        $admin->updated_at = now();
        $admin->save();
// Update Feedback
        return redirect('/users/setting')->with('success', 'Admin ' . $admin->name . ' wurde erfolgreich bearbeitet!');
    }

    // Login logic Process
    public function customLogin(Request $request)
   {
      $data = $request->validate([
          'username' => 'required|string|regex:/^\S*$/u|max:255|unique:user',
          "password"        =>    "required|alphaNum|min:8"
      ]);
      $admin = User::where('username', $request->username)->first();
      if(!$admin){return redirect('/login')->with('error', 'Benutzername oder Passwort ist Falsch!, versuchen Sie bitte erneut');}
          if (Hash::check($request->password, $admin->passwordhash)) {

              if ($admin->is_admin == 0){
                  return redirect('/login')->with('warning', 'Sorry ' . $admin->name . ', Sie Sind kein Admin Benutzer!');
              }
              $request->session()->put('username', $data['username']);
              if (session()->has('username')) {
                  return redirect('/users')->with('info', 'Hallo ' . $admin->name . ' :), Sie haben sich erfolgreich als Admin angemeldet!');
              }
          }
         return redirect('/login')->with('error', 'Passwort oder Benutzername ist falsch, versuchen Sie bitte erneut!');
}

    // Logout process
   public function signOut() {

      if(session()->has('username'))
       {
         session()->pull('username');
       }
        return redirect::to('/login')->with('warning', 'Tschüss, Sie haben sich erfolgreich abgemeldet!');
   }
}
