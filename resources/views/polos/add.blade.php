@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Unidade</h3>
    </div>

    {!! Form::open(['url' => 'units', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Tipo de Unidade') !!}
                            {!! Form::select('type_unit', [
                                '------',
                                'SEDE', 
                                'UR', 
                                'ULSAV', 
                                'EAC',
                                'BARREIRA'
                            ], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Sigla') !!}
                            {!! Form::text('initials', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('active', [0 => 'Não', 1 => 'Sim'], 1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection