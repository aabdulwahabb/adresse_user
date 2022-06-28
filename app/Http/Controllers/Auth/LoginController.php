<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    function checklogin(Request $request)
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
            return redirect('/users')->with('success', 'Sie haben sich erfolgreich angemeldet!');
        }
        else
        {
            return back()->with('error', 'Falsche Zugangsdaten!');
        }

    }

    function successlogin()
    {
        return view('users.index');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message', 'Sie haben Siech erfolgreich abgemeldet!');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
