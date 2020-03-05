@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Editar setor</h3>
    </div>

    {!! Form::open(['url' => 'setores/$setor->intsetorid', 'method' => 'put', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">
    
            {!! Form::hidden('id', $setor->intsetorid) !!}
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('strsetor', $setor->strsetor, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Sigla') !!}
                            {!! Form::text('strsigla', $setor->strsigla, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Unidade') !!}
                            {!! Form::select('idpolo', $polos, $setor->idpolo, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('bolativo', [
                                0 => 'Não',
                                1 => 'Sim'
                            ], $setor->bolativo, ['class' => 'form-control']) !!}
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