@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar unidade</h3>
    </div>

    {!! Form::open(['url' => 'units/$unit->id', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
    
            {!! Form::hidden('id', $unit->id) !!}
            
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
                            ], $unit->type_unit, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Sigla') !!}
                            {!! Form::text('initials', $unit->initials, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('name', 'Nome da Unidade') !!}
                            {!! Form::text('name', $unit->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('active', [
                                0 => 'Não',
                                1 => 'Sim'
                            ], $unit->active, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection