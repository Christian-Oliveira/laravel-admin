@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar unidade</h3>
    </div>

    {!! Form::open(['url' => 'polos/$unit->intpoloid', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
    
            {!! Form::hidden('id', $unit->intpoloid) !!}
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Tipo de Unidade') !!}
                            {!! Form::select('inttipopoloid', [
                                'SEDE' => 'SEDE', 
                                'UR' => 'UR', 
                                'ULSAV' => 'ULSAV', 
                                'EAC' => 'EAC',
                                'BARREIRA' => 'BARREIRA'
                            ], $unit->inttipopoloid, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('strpolo', $unit->strpolo, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Publicar') !!}
                            {!! Form::select('bolpublicar', [
                                'Não' => 'Não',
                                'Sim' => 'Sim'
                            ], $unit->bolpublicar, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('bolativo', [
                                0 => 'Inativo',
                                1 => 'Ativo'
                            ], $unit->bolativo, ['class' => 'form-control']) !!}
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