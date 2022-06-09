<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\UserRight;
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
        $adresse = Adresse::find(1);
        $useradresse = $adresse->user()->get();

        // get all the $users
        $users = XentralUser::paginate(10);
        return View('users.index',
            compact('users'))->with(array(
            "adresse" => $adresse,
            "useradresse" => $useradresse,
        ));
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
   /*
public function store(Request $request) {
    $this->validate($request, [
       'username' => 'required|min:5|max:255',
       'password' => 'required|min:8|max:255',
    ]);
    $newuser = new XentralUser();
    $newuser->username = request('username');
    $newuser->password = request('password');
    $newuser->save();

    return redirect('/');
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
