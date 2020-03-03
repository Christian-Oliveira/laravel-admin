<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;
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

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $unit = new Units();
            
            $unit->type_unit = $data['type_unit'];
            $unit->initials = $data['initials'];
            $unit->name = $data['name'];
            $unit->active = $data['active'];

            $unit->r_auth = Auth::user()->id;

            $unit->save();

            Session::flash('flash_success', "Unidade cadastrada com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou uma unidade: ' . $unit->type_unit));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar unidade!");
        }

        return Redirect::to('/units');
    }

    public function show($id)
    {
        $unit = Units::find($id);

        return view('units.show', [
            'unit' => $unit, 
        ]);
    }

    public function edit($id)
    {
        $unit = Units::find($id);

        return view('units.edit', ['unit' => $unit]);
    }

    public function update(Request $request, $id)
    {   
        try {

            $data = $request->all();

            $unit = Units::find($request->get('id'));
            
            $unit->type_unit = $data['type_unit'];
            $unit->initials = $data['initials'];
            $unit->name = $data['name'];
            $unit->active = $data['active'];

            $unit->save();

            Session::flash('flash_success', "Unidade atualizada com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou uma unidade: ' . $unit->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar unidade!");
        }

        return Redirect::to('/units');
    }

    public function destroy($id)
    {   
        try {

            Units::find($id)->delete();

            Session::flash('flash_success', "Unidade excluída com sucesso");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu a unidade de ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir esta unidade!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir unidade!");
        }

        return Redirect::to('/units');
    }
}
