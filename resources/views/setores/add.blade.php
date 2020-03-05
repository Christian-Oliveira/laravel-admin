@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cadastrar Setor</h3>
    </div>

    {!! Form::open(['url' => 'setores', 'method' => 'post', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8']) !!}

        <div class="box-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('strsetor', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input text required">
                            {!! Form::label('Sigla') !!}
                            {!! Form::text('strsigla', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="input text">
                            {!! Form::label('Unidade') !!}
                            {!! Form::select('idpolo', $units, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input">
                            {!! Form::label('Ativo') !!}
                            {!! Form::select('bolativo', [0 => 'Não', 1 => 'Sim'], 1, ['class' => 'form-control']) !!}
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