<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdresseRolle;
use View;

class AdresseRolleController extends Controller
{
  /**
  * Display a listing of the resource.
  */
 public function index()
 {
   // get all the adresserolle
   $adresserolle = AdresseRolle::latest();
   // load the view and pass the adresserolle
   return View('adresserolle.index',compact('adresserolle'));
 }

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
 public function store(Request $request)
 {
   // validate

           $this->validate($request, [
               'adresse'       => 'required|numeric',
               'objekt'       => 'required',
               'projekt'      => 'required|numeric',
               ]);


               // store
              AdresseRolle::create([
               'adresse'      =>  $request->integer,
               'objekt'      =>  $request->string,
               'projekt'      =>  $request->integer,
             ]);
      return back();

 }

 /**
  * Display the specified resource.
  */
 public function show($id)
 {
   // get the adressRolle
   $adresseroll = AdresseRolle::find($id);

   // show the view and pass the adressRolle to it
   return View('adresserolle.show',compact('adresseroll'));
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
