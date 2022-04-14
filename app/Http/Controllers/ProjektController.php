<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use View;

class ProjektController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the projekte
        $projekte = Project::paginate(10);
        // load the view and pass the adresse
        return View('projekte.index',compact('projekte'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/projekte/create.blade.php)
        return View('projekte.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate

        $this->validate($request, [
            'name'       => 'required',
            'abkuerzung'       => 'required',
            'verantwortlicher'      => 'required',
        ]);


        // store
        Project::create([
            'name'      =>  $request->string,
            'abkuerzung'      =>  $request->string,
            'verantwortlicher'      =>  $request->string,
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the projekt
        $projekt = Project::find($id);

        // show the view and pass the projekt to it
        return View('projekte.show',compact('projekt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $projekt)
    {
        return View('projekte.edit',compact('projekt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $projekt)
    {
        $this->validate($request, [
            'name'       => 'required',
            'abkuerzung'       => 'required',
            'verantwortlicher'      => 'required',
        ]);

        $projekt->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $projekt)
    {
        $projekt->delete();
        return back();
    }
}
