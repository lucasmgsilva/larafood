@extends('adminlte::page')

@section('title', 'Detalhes Perfil {{$profile->name}}')

@section('content_header')
    <h1>Detalhes Perfil <b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->description}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$profile->name}}</b></button>
            </form>
        </div>
    </div>
@stop
