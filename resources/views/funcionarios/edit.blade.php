@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar usuário</h3>
    </div>

    {!! Form::open(['url' => 'funcionarios/$user->idfuncionario', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
        
            @if(isset($user->perfil) && $user->perfil->administrator != 1)
                <div class="text-right">
                    <a href="{{ URL('/') }}/{{$user->idfuncionario}}/permissions" class="btn btn-warning">Permissões</a>
                </div>
            @endif

            <input type="hidden" name="id" value="{{$user->idfuncionario}}">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('strnome', $user->strnome, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Nome de Usuário') !!}
                            {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input password">
                            {!! Form::label('Senha') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Setor') !!}
                            {!! Form::select('idsetor', $setores, $user->idsetor, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Config') !!}
                            {!! Form::select('strchave_config', $strchave, $user->strchave_config, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Perfil') !!}
                            {!! Form::select('profile_id', $profiles, $user->profile_id, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Status') !!}
                            {!! Form::select('idstatus', [
                                0 => '------',
                                1 => 'inativo',
                                2 => 'ativo',
                            ], $user->idstatus, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                
            </div>

            <div class="form-group text-right">
                <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection