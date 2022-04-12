<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XentralUser;
use View;

class XentralUserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // get all the Users
    $users = XentralUser::paginate(10);
    // load the view and pass the Users
    return View('users.index',compact('users'));
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
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // validate

            $this->validate($request, [
                'adresse'       => 'required|numeric',
                'type'       => 'required',
                'username'      => 'required',
                ]);


                // store
               XentralUser::create([
                'adresse'      =>  $request->integer,
                'type'      =>  $request->string,
                'username'      =>  $request->string,
              ]);
       return back();

  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    // get the user
    $user = XentralUser::find($id);

    // show the view and pass the user to it
    return View('users.show',compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(xentraluser $user)
  {
  return View('users.edit',compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, xentraluser $user)
  {
    $this->validate($request, [
        'adresse'       => 'required|numeric',
        'type'      => 'required',
        'username'       => 'required',
       ]);

       $user->update($request->all());
       return back();
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
