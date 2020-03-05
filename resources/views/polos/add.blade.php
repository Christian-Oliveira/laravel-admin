@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Unidade</h3>
    </div>

    {!! Form::open(['url' => 'polos', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

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
                            ], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('strpolo', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Publicar') !!}
                            {!! Form::select('bolpublicar', ['Não' => 'Não', 'Sim' => 'Sim'], 'Sim', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('bolativo', [0 => 'Inativo', 1 => 'Ativo'], 1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary bgpersonalizado']) !!}
            </div>
        </div>

    {!! Form::close() !!}

</div>

@endsection