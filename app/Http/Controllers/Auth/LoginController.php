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
            $neuadmin->password = Hash::make($request->password);
            $neuadmin->repassword = Hash::make($request->repassword);
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
        if ($request->password != $admin->password) {
            $this->validate($request, [
                'password' => 'sometimes|string|min:8',
                'repassword' => 'sometimes|same:password',
            ]);
        }

// Store Update in admin users table
        $admin = User::find($request->admin_id);
        $admin->name = $request->name;
        $admin->email = strtolower($request->email);
        $admin->username = strtolower($request->username);
        $admin->password = Hash::make($request->password);
        $admin->repassword = Hash::make($request->repassword);
        $admin->save();
// Update Feedback
        return redirect('/users/setting')->with('success', 'Admin: ' . $admin->name . ' wurde erfolgreich bearbeitet!');
    }

    // Login logic Process
    public function customLogin(Request $request)
   {
      $data = $request->validate([
          'username' => 'required|string|regex:/^\S*$/u|max:255|unique:user',
          "password"        =>    "required|alphaNum|min:8"
      ]);
           if (User::where('username', $request->username)
               ->where('password', $request->password)
               ->where('is_admin', 1)
               ->first()) {
               $request->session()->put('username', $data['username']);
               if (session()->has('username')) {
                   return redirect('/users')->with('info', 'Sie haben sich erfolgreich als Admin angemeldet!');
               }

           } elseif (User::where('username', $request->username)
               ->where('password', $request->password)
               ->where('is_admin', 0)
               ->first()) {
               return redirect('/login')->with('error', 'Sie Sind kein Admin User!');
           }
         return redirect('/login')->with('error', 'Falsche Zugangsdaten, versuchen Sie bitte erneut!');
}

    // Logout process
   public function signOut() {

      if(session()->has('username'))
       {
         session()->pull('username');
       }
        return redirect::to('/login')->with('warning', 'Sie haben sich erfolgreich abgemeldet!');
   }
}
