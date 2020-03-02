<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use \App\Permissions;
use \App\Units;
use \App\Logs;

class UnitsController extends Controller
{
    public function index(Request $request)
    {
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $units = Units::all();
        } else {
            $units = Units::where('r_auth', $logged->id)->get();
        }

        return view('units.index', ['units' => $units]);
    }

    public function create()
    {
        return view('units.add');
    }
}
