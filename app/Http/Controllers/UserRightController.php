<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRight;
use View;

class UserRightController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // get all the Userrights
      $userrights = Userright::latest();
      // load the view and pass the Userrights
      return View('userrights.index',compact('userrights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      // load the create form (app/views/userrights/create.blade.php)
      return View('userrights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // validate

              $this->validate($request, [
                  'action'       => 'required',
                  'module'       => 'required',
                  'permission'   => 'required',
                  'user'      => 'required|numeric',
                  ]);


                  // store
                 UserRight::create([
                  'action'      =>  $request->string,
                  'module'      =>  $request->string,
                  'permission'  =>  $request->boolean,
                  'user'      =>  $request->integer,
                ]);
         return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      // get the userright
      $userright = Userright::find($id);

      // show the view and pass the userright to it
      return View('userrights.show',compact('userright'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userright $userright)
    {
    return View('userrights.edit',compact('userright'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userright $userright)
    {
      $this->validate($request, [
        'action'       => 'required',
        'module'       => 'required',
        'permission'   => 'required',
        'user'      => 'required|numeric',
         ]);

         $userright->update($request->all());
         return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(userright $userright)
    {
      $userright->delete();
       return back();
    }
}
