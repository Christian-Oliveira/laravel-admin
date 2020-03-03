<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;
use \App\Permissions;
use \App\Sectors;
use \App\Units;
use \App\Logs;

class SectorsController extends Controller
{
    public function index(Request $request)
    {
        $logged = Auth::user();

        $sectors = Sectors::all();
        foreach($sectors as $sector)
        {
            $sector = Units::find($sector->units_id);
            $sector->units_id = $sector->name;
        }
        return view('sectors.index', ['sectors' => $sectors]);
    }

    public function create()
    {
        return view('sectors.add');
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $sector = new Sectors();
            
            $sector->strsetor = $data['strsetor'];
            $sector->strsigla = $data['strsigla'];
            $sector->units_id = $data['units_id'];
            $sector->bolativo = $data['bolativo'];

            //$sector->r_auth = Auth::user()->id;

            $sector->save();

            Session::flash('flash_success', "Setor cadastrada com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um setor: ' . $sector->strsetor));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar setor!");
        }

        return Redirect::to('/sectors');
    }
}
