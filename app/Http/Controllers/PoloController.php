<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;
use \App\Permissions;
use \App\Polo;
use \App\Logs;

class PoloController extends Controller
{
    public function index(Request $request)
    {
        $logged = Auth::user();

        $units = Polo::all();

        return view('polos.index', ['units' => $units]);
    }

    public function create()
    {
        return view('polos.add');
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $unit = new Polo();
            
            $unit->inttipopoloid = $data['inttipopoloid'];
            $unit->strpolo = $data['strpolo'];
            $unit->bolpublicar = $data['bolpublicar'];
            $unit->bolativo = $data['bolativo'];

            $unit->save();

            Session::flash('flash_success', "Unidade cadastrada com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' cadastrou uma unidade: ' . $unit->strpolo));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar unidade!");
        }

        return Redirect::to('/polos');
    }

    public function show($id)
    {
        $unit = Polo::find($id);
        $setores = Polo::find($unit->intpoloid)->setores;

        return view('polos.show', [
            'unit' => $unit, 
            'setores' => $setores,
        ]);
    }

    public function edit($id)
    {
        $unit = Polo::find($id);
        return view('polos.edit', ['unit' => $unit]);
    }

    public function update(Request $request, $id)
    {   
        try {

            $data = $request->all();

            $unit = Polo::find($request->get('id'));
            
            $unit->inttipopoloid = $data['inttipopoloid'];
            $unit->strpolo = $data['strpolo'];
            $unit->bolpublicar = $data['bolpublicar'];
            $unit->bolativo = $data['bolativo'];

            $unit->save();

            Session::flash('flash_success', "Unidade atualizada com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' atualizou uma unidade: ' . $unit->strpolo));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar unidade!");
        }

        return Redirect::to('/polos');
    }

    public function destroy($id)
    {   
        try {

            Polo::find($id)->delete();

            Session::flash('flash_success', "Unidade excluída com sucesso");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' excluiu a unidade de ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir esta unidade!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir unidade!");
        }

        return Redirect::to('/polos');
    }
}
