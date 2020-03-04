@extends('layouts.app')

@section('content')

<div class="box">
    
    <div class="box-header">
        <h3 class="box-title">Setores</h3>
    </div>

    <div class="box-body table-responsive">

        <table id="datatable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unidade</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Ativo</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($sectors as $value)

                <tr>
                    <td> {{$value->id}} </td>

                    <td> {{$value->units_id}} </td>
                    
                    <td> 
                        {{$value->strsetor}}
                    </td>

                    <td> {{$value->strsigla}} </td>
                                        
                    <td> {{$value->active}} </td>
                    
                    <td>

                        <a href="{{ URL('/') }}/sectors/{{$value->id}}/edit" alt="Editar" title="Editar" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="{{ URL('/') }}/sectors/{{$value->id}}" alt="Visualizar" title="Visualizar" class="btn btn-default">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>

                        <form method="POST" action="{{ route('sectors.destroy', $value->id) }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="return confirm('Tem certeza que quer deletar?')" class="btn btn-danger glyphicon glyphicon-trash">
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <br><br>

        <div class="form-group text-right">
            <a href="{{ URL('/') }}/sectors/create" class="btn btn-primary bgpersonalizado">Cadastrar</a>
        </div>

    </div>

</div>

@endsection