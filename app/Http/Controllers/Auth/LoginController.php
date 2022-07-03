<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\XentralUser;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('auth.login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('username',$request->username)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('/users');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect::to('/login');
    }
}
