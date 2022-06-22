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
