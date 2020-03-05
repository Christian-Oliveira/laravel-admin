<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;
use \App\Permissions;
use \App\Setor;
use \App\Polo;
use \App\Logs;

class SetorController extends Controller
{
    public function index(Request $request)
    {
        $logged = Auth::user();

        $setores = Setor::all();
        foreach($setores as $setor)
        {
            $setor->idpolo = Polo::find($setor->idpolo)->strpolo;
        }
        return view('setores.index', ['setores' => $setores]);
    }

    public function create()
    {
        $units = Polo::pluck('strpolo', 'intpoloid');
        return view('setores.add', ['units' => $units]);
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $setor = new Setor();
            
            $setor->strsetor = $data['strsetor'];
            $setor->strsigla = $data['strsigla'];
            $setor->idpolo = $data['idpolo'];
            $setor->bolativo = $data['bolativo'];

            $setor->save();

            Session::flash('flash_success', "Setor cadastrada com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' cadastrou um setor: ' . $setor->strsetor));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar setor!");
        }

        return Redirect::to('/setores');
    }

    public function show($id)
    {
        $setor = Setor::find($id);
        $setor->idpolo = Polo::find($setor->idpolo)->strpolo;
        return view('setores.show', [
            'setor' => $setor, 
        ]);
    }

    public function edit($id)
    {
        $setor = Setor::find($id);
        $polos = Polo::pluck('strpolo', 'intpoloid');
        return view('setores.edit', ['setor' => $setor, 'polos' => $polos]);
    }

    public function update(Request $request, $id)
    {   
        try {

            $data = $request->all();

            $setor = Setor::find($request->get('id'));
            
            $setor->strsetor = $data['strsetor'];
            $setor->strsigla = $data['strsigla'];
            $setor->idpolo = $data['idpolo'];
            $setor->bolativo = $data['bolativo'];

            $setor->save();

            Session::flash('flash_success', "Setor atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' atualizou um setor: ' . $setor->strsetor));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar setor!");
        }

        return Redirect::to('/setores');
    }

    public function destroy($id)
    {   
        try {

            Setor::find($id)->delete();

            Session::flash('flash_success', "Setor excluído com sucesso");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' excluiu a unidade de ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este setor!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir setor!");
        }

        return Redirect::to('/setores');
    }
}
