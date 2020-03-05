<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Session;

use \App\Funcionario;
use \App\Setor;
use \App\Config;
use \App\Profiles;
use \App\Logs;
use \App\Permissions;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $logged = Auth::user();
        
        $funcionarios = Funcionario::all();
        foreach($funcionarios as $funcionario)
        {
            $funcionario->idsetor = Setor::find($funcionario->idsetor)->strsetor;
        }

        return view('funcionarios.index', [
            'funcionarios' => $funcionarios
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $profiles = Profiles::pluck('name', 'id');
        } else {
            $profiles = Profiles::where('r_auth', $logged->id)->orWhere('default', 1)->pluck('name', 'id');
        }
        
        $profile_id = Profiles::returnDefault();
        $setores = Setor::pluck('strsetor', 'intsetorid');
        $strchave = Config::pluck('strvalor', 'strchave');

        return view('funcionarios.add', [
            'profiles' => $profiles,
            'profile_id' => $profile_id,
            'setores' => $setores,
            'strchave' => $strchave,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        try {
            
            $data = $request->all();

            $func = new Funcionario();
            
            $func->strnome = $data['strnome'];
            $func->username = $data['username'];
            $func->password = bcrypt($data['password']);
            $func->idsetor = $data['idsetor'];
            $func->strchave_config = $data['strchave_config'];
            $func->profile_id = $data['profile_id'];
            $func->idstatus = $data['idstatus'];
            
            $func->save();

            Session::flash('flash_success', "Usuário cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' cadastrou o usuário: ' . $func->strnome));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar usuário!");
        }

        return Redirect::to('/funcionarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logged = Auth::user();

        $func = Funcionario::find($id);

        if (Permissions::permissaoModerador($logged)) {
            $profiles = Profiles::pluck('name', 'id');
        } else {
            $profiles = Profiles::where('r_auth', $logged->id)->orWhere('default', 1)->pluck('name', 'id');
        }

        $setores = Setor::pluck('strsetor', 'intsetorid');
        $strchave = Config::pluck('strvalor', 'strchave');

        return view('funcionarios.show', [
            'user' => $func,
            'profiles' => $profiles,
            'setores' => $setores,
            'strchave' => $strchave,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logged = Auth::user();

        $func = Funcionario::find($id);

        if (Permissions::permissaoModerador($logged)) {
            $profiles = Profiles::pluck('name', 'id');
        } else {
            $profiles = Profiles::where('r_auth', $logged->id)->orWhere('default', 1)->pluck('name', 'id');
        }

        $setores = Setor::pluck('strsetor', 'intsetorid');
        $strchave = Config::pluck('strvalor', 'strchave');
        
        return view('funcionarios.edit', [
            'user' => $func, 
            'profiles' => $profiles,
            'setores' => $setores,
            'strchave' => $strchave,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        try {

            $data = $request->all();

            $func = Funcionario::find($data['id']);
            
            $func->strnome = $data['strnome'];
            $func->username = $data['username'];
            $func->idsetor = $data['idsetor'];
            $func->strchave_config = $data['strchave_config'];
            $func->profile_id = $data['profile_id'];
            
            if ($data['idstatus'] != 0){
                $func->idstatus = $data['idstatus'];
            }
            if ($data['password']) {
                $func->password = bcrypt($data['password']);
            }

            $func->save();

            Session::flash('flash_success', "Usuário atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' atualizou o usuário: ' . $func->strnome));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar usuário!");
        }

        return Redirect::to('/funcionarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {

            Funcionario::find($id)->delete();

            Session::flash('flash_success', "Usuário excluído com sucesso");

            Logs::cadastrar(Auth::user()->idfuncionario, (Auth::user()->strnome . ' excluiu o usuário ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este usuário!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir usuário!");
        }

        return Redirect::to('/funcionarios');
    }
}
