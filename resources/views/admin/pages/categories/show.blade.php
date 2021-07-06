@extends('adminlte::page')

@section('title', 'Detalhes Categoria {{$category->name}}')

@section('content_header')
    <h1>Detalhes Categoria <b>{{$category->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome: </strong> {{$category->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$category->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$category->description}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$category->name}}</b></button>
            </form>
        </div>
    </div>
@stop
