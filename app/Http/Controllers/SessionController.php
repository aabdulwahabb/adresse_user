<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function create()
    {
        return view('components.login');
    }

    public function authenticate(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        }
            return Redirect::to("/")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function home()
    {

        if(Auth::check()){
            return view('/adresse');
        }
        return Redirect::to("/")->withSuccess('Opps! You do not have access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }

}
