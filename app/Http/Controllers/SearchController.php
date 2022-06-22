<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\XentralUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Searchable\Search;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        $input = $request->input('search');
        if (!empty($input))
        {
            $users = XentralUser::join('adresse', 'user.adresse', 'adresse.id')
            ->where('username', 'LIKE', '%' . $input . '%')
            ->orWhere('name', 'LIKE', '%' . $input . '%')->get();
            if(count($users) > 0)
            {
                return View('users.index', compact('users'));
            }
            else
            {
                Session::flash('status', 'Kein Ergebnis gefunden. Versuchen Sie bitte erneut!');
                    return redirect::to('/users');
            }
        }
        else
        {
            $users = XentralUser::paginate(10);
            return View('users.index', compact('users'));
        }
    }
}
