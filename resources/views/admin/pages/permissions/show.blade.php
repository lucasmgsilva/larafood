@extends('adminlte::page')

@section('title', 'Detalhes Permissão {{$permission->name}}')

@section('content_header')
    <h1>Detalhes Permissão <b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->description}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$permission->name}}</b></button>
            </form>
        </div>
    </div>
@stop
