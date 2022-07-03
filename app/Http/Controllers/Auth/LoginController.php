<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validate;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

public function loginview()
{
    return view('auth.login');
}

public function checklogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|string',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/users')->with('message', 'Sie haben sich erfolgreich angemeldet!');
        }
        else
        {
            return redirect('/login')->with('error', 'Falsche Zugangsdaten!');
        }

    }

public function successlogin()
    {
        return view('users.index');
    }

public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message', 'Sie haben Siech erfolgreich abgemeldet!');
    }
}
