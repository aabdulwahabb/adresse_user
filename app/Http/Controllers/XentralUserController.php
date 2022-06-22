<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\AdresseRolle;
use App\Models\Project;
use App\Models\UserRight;
use Illuminate\Http\Request;
use App\Models\XentralUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use View;

class XentralUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = XentralUser::paginate(10);
        return View('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/users/create.blade.php)
        return View('users.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the user
        $user = XentralUser::find($id);

        // show the view and pass the user to it
        return View('users.show', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // validate adresse
        $this->validate($request, [
            'typ' => 'sometimes|string',
            'name' => 'required|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
            'email' => 'required|string|unique:adresse|max:255',
            'abteilung' => 'nullable',
            'telefon' => 'nullable|numeric|unique:adresse',
            'ansprechpartner' => 'nullable',
            'username' => 'required|regex:/^\S*$/u|max:255|unique:user',
            'password' => 'required|min:8|max:255',
            'repassword' => 'required|min:8|same:password',
        ]);
        // store adresse
        $neuadresse = Adresse::create([
            'typ' => request('typ'),
            'name' => request('name'),
            'email' => request('email'),
            'abteilung' => request('abteilung'),
            'telefon' => request('telefon'),
            'ansprechpartner' => request('ansprechpartner'),
            'freifeld1' => 'intern',
            'bundesstaat' => 'NRW',
            'firma' => 1,
            'logdatei' => now(),
            'mandatsreferenzart' => 'einmalig',
            'mandatsreferenzwdhart' => 'erste',
            'rechnung_typ' => 'firma',
            'rechnung_land' => 'DE',
            'sprache' => 'deutsch',
            'projekt' => 10
        ]);

        // store user
        $newuser = XentralUser::create([
            'username' => request('username'),
            'password' => request('password'),
            'repassword' => request('repassword'),
            'type' => 'standard',
            'adresse' => $neuadresse->id,
            'settings' => 'Tjs=',
            'startseite' => 'index.php?module=welcome&action=start',
            'logdatei' => now(),
            'activ' => 1,
            'sprachebevorzugen' => 'deutsch',
            'externlogin' => 1,
            'standardetikett' => 43
        ]);

        // store stechuhr user
        XentralUser::create([
            'username' => '100' . random_int(100, 999),
            'password' => request('password'),
            'repassword' => request('repassword'),
            'type' => 'standard',
            'adresse' => $neuadresse->id,
            'startseite' => 'index.php?module=stechuhr&action=list',
            'logdatei' => now(),
            'activ' => 1,
            'sprachebevorzugen' => 'deutsch',
            'externlogin' => 1,
            'standardetikett' => 25,
            'stechuhrdevice' => 'RzA5US8F5Z',
        ]);

        // store rolle
        $projektinput = Project::select('id')->where('abkuerzung', request('projekt'))->first();
        AdresseRolle::create([
            'adresse' => $neuadresse->id,
            'projekt' => 0,
            'subjekt' => 'Mitarbeiter',
            'praedikat' => 'von',
            'objekt' => 'projekt',
            'parameter' => '',
            'von' => now(),
            'bis' => date('0000-00-00'),
        ]);
        Session::flash('message', 'Benutzer wurde erflogreich angelegt');
        return redirect::to('/users/id=' . $newuser->id);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = XentralUser::find($id);
        return View('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {

        $this->validate($request, [
          'typ' => 'sometimes',
          'name' => 'sometimes|regex:/^[A-Za-z]+([\ A-Za-z]+)*/',
          'email' => 'sometimes|string|max:255',
          'abteilung' => 'sometimes|nullable',
          'telefon' => 'sometimes|nullable|numeric',
          'ansprechpartner' => 'sometimes|nullable',
            'username' => 'sometimes|regex:/^\S*$/u|max:255',
            'password' => 'sometimes|required|min:8|max:255',
            'repassword' => 'sometimes|required_with:password|min:8|same:password',
        ]);

        $user = XentralUser::find($request->id);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->repassword = $request->repassword;
        $adress = Adresse::find($request->id);
        $adress->typ = $request->typ;
        $adress->name = $request->name;
        $adress->email = $request->email;
        $adress->telefon = $request->telefon;
        $adress->ansprechpartner = $request->ansprechpartner;
        $adress->abteilung = $request->abteilung;
        $adress->save();
        $user->save();
        Session::flash('message', 'Benutzer wurde erfolgreich bearbeitet!');
        return redirect::to('/users/id=' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(xentraluser $user)
    {
        $user->delete();
        return back();
    }
}
