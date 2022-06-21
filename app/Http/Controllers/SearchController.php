<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\XentralUser;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the users
        $users = XentralUser::paginate(10);
        // load the view and pass the users
        return View('users.index', compact('users'));

    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Adresse::class, 'name')
            ->registerModel(XentralUser::class, 'username')
            ->perform($request->input('search'));

        return view('users.index', compact('searchResults'));
    }


}
