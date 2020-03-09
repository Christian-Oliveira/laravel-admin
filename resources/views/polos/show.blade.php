@extends('layouts.app')

@section('content')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Unidade #{{$unit->intpoloid}}</h3>
    </div>

    <div class="box-body">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Tipo de Unidade') !!}
                        {!! Form::text('inttipopoloid', $unit->inttipopoloid, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Nome') !!}
                        {!! Form::text('strpolo', $unit->strpolo, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Publicar') !!}
                        {!! Form::text('bolpublicar', $unit->bolpublicar, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input text">
                        {!! Form::label('Ativo') !!}
                        {!! Form::select('bolativo', [0=>'Inativo', 1=>'Ativo'], $unit->bolativo, ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Setores da Unidade</label>
                <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Ativo</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        
                        @foreach($setores as $value)
        
                        <tr>
                            <td> {{$value->intsetorid}} </td>
                            
                            <td> {{$value->strsetor}} </td>
        
                            <td> {{$value->strsigla}} </td>
                                                
                            <td>
                                @if($value->bolativo)
                                    Ativo
                                @else
                                    Inativo
                                @endif
                            </td>
                        </tr>
        
                        @endforeach
        
                    </tbody>
        
                </table>
            </div>
        </div>
        <div class="form-group text-left">
            <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
            <a href="javascript::void(0);" onclick="print();" class="btn btn-primary">Imprimir</a>
        </div>

    </div>

</div>

@endsection