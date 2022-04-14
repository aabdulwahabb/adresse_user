<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\AdresseRolle;
use App\Models\Project;
use App\Models\XentralUser;
use Illuminate\Http\Request;
use App\Models\UserRight;
use View;

class UserRightController extends Controller
{
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
        $user = XentralUser::find($id);
        $userrights = $user->userright()->get();

        // get all the $userrightes
        $userrightes = UserRight::paginate(10);
        return View('userrights.index', compact('userrightes'))->with(array("user" => $user,
            "userrights" => $userrights,
           ));
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
