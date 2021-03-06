<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\AdresseRolle;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;
use View;

class AdresseRolleController extends Controller
{
 /**
  * Show the form for creating a new resource.
  */
 public function create()
 {
   // load the create form (app/views/adresseroll/create.blade.php)
   return View('adresserolle.create');
 }

 /**
  * Store a newly created resource in storage.
  */
 /*
 public function store()
 {
 // validate // store
     $attributes = request()->validate([
             'projekt'       => Project::where('abkuerzung', '=', $request->input('projekt'))->first();
             => 'required',
             ]);
             AdresseRolle::create($attributes);

             return redirect('/');
}

 /**
  * Display the specified resource.
  */
 public function show($id)
 {
     $adress = Adresse::find($id);
     $adresserolle = $adress->adresseRolle()->get();
     // get all the adresserolle
     $adresserolls = AdresseRolle::paginate(10);
     return View('adresserolle.index',
         compact('adresserolls'))->with(array(
         "adress" => $adress,
         "adresserolle" => $adresserolle,
       ));
 }

 /**
  * Show the form for editing the specified resource.
  */
 public function edit(adresserolle $adresseroll)
 {
 return View('adresserolle.edit',compact('adresseroll'));
 }

 /**
  * Update the specified resource in storage.
  */
 public function update(Request $request, adresserolle $adresseroll)
 {
   $this->validate($request, [
       'adresse'       => 'required|numeric',
       'objekt'       => 'required',
       'projekt'      => 'required|numeric',
      ]);

     $adresseroll->update($request->all());
      return back();
 }

 /**
  * Remove the specified resource from storage.
  */
 public function destroy(adresserolle $adresseroll)
 {
     $adresseroll->delete();
    return back();
 }
}
