<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\XentralUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Searchable\Search;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class SearchController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void

     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect::to('/users');
        }else{
            Session::flash('message', 'Benutzername und Passeort sind ungültig');
            return redirect::to('/login');
        }
    }
}
