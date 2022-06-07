<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the Team
        $teams = Team::paginate(10);
        // load the view and pass the Team
        return View('team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/team/create.blade.php)
        return View('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate

        $this->validate($request, [
            'name'       => 'required',
            'icon'       => 'required',
            'active'      => 'required',
        ]);


        // store
        Team::create([
            'name'      =>  $request->string,
            'icon'      =>  $request->string,
            'active'      =>  $request->integer,
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the team
        $team = Team::find($id);

        // show the view and pass the projekt to it
        return View('team.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(team $team)
    {
        return View('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, team $team)
    {
        $this->validate($request, [
            'name'       => 'required',
            'icon'       => 'required',
            'active'      => 'required',
        ]);

        $team->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(team $team)
    {
        $team->delete();
        return back();
    }
}
