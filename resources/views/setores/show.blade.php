@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Setor #{{$setor->intsetorid}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome') !!}
                        {!! Form::text('strsetor', $setor->strsetor, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Sigla') !!}
                        {!! Form::text('strsigla', $setor->strsigla, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Unidade') !!}
                        {!! Form::text('idpolo', $setor->idpolo, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Ativo') !!}
                        {!! Form::select('bolativo', [0=>'Inativo', 1=>'Ativo'], $setor->bolativo, ['class' => 'form-control', 'disabled' => true]) !!}
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