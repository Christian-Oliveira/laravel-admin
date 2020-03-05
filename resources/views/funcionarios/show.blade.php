@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Usuário #{{$user->idfuncionario}}</h3>
    </div>

    <div class="box-body">
    
        @if(isset($user->perfil) && $user->perfil->administrator != 1)
            <div class="text-right">
                <a href="{{ URL('/') }}/{{$user->idfuncionario}}/permissions" class="btn btn-warning">Permissões</a>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Nome de Usuário') !!}
                        {!! Form::text('username', $user->username, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome') !!}
                        {!! Form::text('name', $user->strnome, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Setor') !!}
                        {!! Form::select('idsetor', $setores, $user->idsetor, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Config') !!}
                        {!! Form::text('strchave_config', $user->strchave_config, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Perfil') !!}
                        {!! Form::select('profile_id', $profiles, $user->profile_id, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text required">
                        {!! Form::label('Status') !!}
                        {!! Form::text('idstatus', $user->idstatus, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-left">
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            <a href="javascript::void(0);" onclick="print();" class="btn btn-primary">Imprimir</a>
        </div>

    </div>

</div>

@endsection