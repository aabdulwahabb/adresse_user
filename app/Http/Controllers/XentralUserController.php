<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
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
        // get all the user
  $users = XentralUser::paginate(10);

        // load the view and pass the users
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
  public function edit($id)
  {
      $user = XentralUser::find($id);
  return View('users.edit',compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
    public function update(Request $request, xentraluser $user)
    {



        $user->update($request->all());
        //  Xentraluser::where('id', $user->id)->update($request->except(['_token', '_method']));

        Session::flash('message', 'Successfully updated adresse!');
        return redirect()->route('users.index');
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
