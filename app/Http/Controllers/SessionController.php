<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('components.login');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
           'username' => 'required|string',
            'password' => 'required'
        ]);

        //attempt to authenticate and log in the user
        // based on the provided credentials
        if(! auth()->attempt($attributes)) {
            // auth failed.? and redirect with a success flash message
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified.'
            ]);
        }
        // session fixation
        session()->regenerate();
        return redirect('/adresse')->with('success', 'welcome back!');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

}
