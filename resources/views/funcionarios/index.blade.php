@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Usuários</h3>
    </div>

    <div class="box-body table-responsive">

        <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>Setor</th>
                    <th>Perfil</th>
                    <th>Config</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($funcionarios as $value)

                <tr>
                    <td> {{$value->idfuncionario}} </td>

                    <td> {{ucwords(strtolower($value->strnome))}} </td>
                        
                    <td> {{$value->username}}</td>

                    <td>{{$value->idsetor}}</td>

                    <td> {{ (isset($value->perfil) ? $value->perfil->name : '') }} </td>

                    <td>{{$value->strchave_config}}</td>

                    <td>{{$value->idstatus}}</td>

                    <td>

                        <a href="{{ URL('/') }}/funcionarios/{{$value->idfuncionario}}/edit" alt="Editar" title="Editar" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/funcionarios/{{$value->idfuncionario}}" alt="Visualizar" title="Visualizar" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('funcionarios.destroy', $value->idfuncionario) }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash btn-sm">
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <br><br>

        <div class="form-group text-right">
            <a href="{{ URL('/') }}/funcionarios/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection