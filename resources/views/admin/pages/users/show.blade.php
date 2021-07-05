@extends('adminlte::page')

@section('title', 'Detalhes Usuário {{$user->name}}')

@section('content_header')
    <h1>Detalhes Usuário <b>{{$user->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$user->name}}
                </li>
                <li>
                    <strong>E-mail: </strong> {{$user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong> {{$user->tenant->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$user->name}}</b></button>
            </form>
        </div>
    </div>
@stop
