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
      if ($request->ajax()) {
            $data = XentralUser::select('*')->join('adresse', 'user.adresse', 'adresse.id');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('activ', function($row){
                         if($row->activ){
                            return '<span class="badge badge-primary">Active</span>';
                         }else{
                            return '<span class="badge badge-danger">Deactive</span>';
                         }
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('activ') == '0' || $request->get('activ') == '1') {
                            $instance->where('activ', $request->get('activ'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('username', 'LIKE', "%$search%")
                                ->orWhere('name', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->rawColumns(['activ'])
                    ->make(true);
        }

        $users = XentralUser::paginate(10);
        return View('users.index', compact('users'));
    }
}
