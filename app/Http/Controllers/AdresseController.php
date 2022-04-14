<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\AdresseRolle;
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
    // validate

            $this->validate($request, [
                'typ'       => 'required',
                'name'       => 'required',
                'email'      => 'required|email',
                ]);


                // store
               Adresse::create([
                'typ'      =>  $request->string,
                'name'      =>  $request->string,
                'email'      =>  $request->email,
              ]);
       return back();

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
