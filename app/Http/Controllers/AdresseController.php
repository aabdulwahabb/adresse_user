<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\XentralUser;
use App\Models\Userright;
use App\Models\AdresseRolle;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Compound;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use View;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the adresse
        $adresse = Adresse::paginate(10);
        // load the view and pass the adresse
        return View('adresse.index', compact('adresse'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/adresse/create.blade.php)
        return View('adresse.create');
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
            'repassword' => request('password'),
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
        Session::flash('message', 'Successfully created Benutzer!');
        return redirect::to('/users/id=' . $newuser->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the adresse
        $adress = Adresse::find($id);
        // show the view and pass the user to it
        return View('adresse.show', compact('adress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $adress = Adresse::find($id);
        return View('adresse.edit', compact('adress'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(adresse $adress)
    {
        $adress->delete();
        return back();
    }
}
