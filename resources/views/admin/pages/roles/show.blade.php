@extends('adminlte::page')

@section('title', 'Detalhes Cargo {{$role->name}}')

@section('content_header')
    <h1>Detalhes Cargo <b>{{$role->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$role->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$role->description}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$role->name}}</b></button>
            </form>
        </div>
    </div>
@stop
