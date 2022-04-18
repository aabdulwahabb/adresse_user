<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\XentralUser;
use App\Models\Userright;
use App\Models\AdresseRolle;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
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
    return View('adresse.index',compact('adresse'));
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
                 'typ'       => 'required|min:4|max:4',
                 'name'       => 'required|max:255',
                 'email'   => 'required|max:255',
                 ]);
                 // store adresse
              $neuadresse = Adresse::create([
                 'typ'      =>  request('typ'),
                 'name'      =>  request('name'),
                 'email'  =>  request('email'),
               ]);
               // validate user
                 $this->validate($request, [
                     'username'       => 'required|max:255',
                     'password'       => 'required|min:8|max:255',
                     ]);
                 // store user
                XentralUser::create([
                 'username'      =>  request('username'),
                 'password'      =>  request('password'),
                 'adresse'       =>  $neuadresse->id,
               ]);
               // validate rolle
               $this->validate($request, [
                   'projekt'       => 'required|max:5|min:5',
                   ]);
               // store rolle
               $projektinput = Project::select('id')->where('abkuerzung', request('projekt'))->first();
              AdresseRolle::create([
               'projekt'      => $projektinput->id,
               'adresse'       =>  $neuadresse->id,
             ]);
       return redirect('/');
   }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    // get the adress
    $adress = Adresse::find($id);
      $adresserolle = $adress->adresseRolle()->get();

    // show the view and pass the adress to it
    return View('adresse.show',compact('adress'))->with('adresserolle', $adresserolle);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(adresse $adress)
  {
  return View('adresse.edit',compact('adress'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, adresse $adress)
  {
    $this->validate($request, [
        'typ'       => 'required',
        'name'       => 'required',
        'email'      => 'required|email',
       ]);

       $adress->update($request->all());
       return back();
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
