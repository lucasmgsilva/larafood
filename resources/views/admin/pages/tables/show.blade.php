@extends('adminlte::page')

@section('title', 'Detalhes Mesa {{$table->identify}}')

@section('content_header')
    <h1>Detalhes Mesa <b>{{$table->identify}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Identificador: </strong> {{$table->identify}}
                </li>
                <li>
                    <strong>URL: </strong> {{$table->url}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$table->description}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('tables.destroy', $table->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$table->identify}}</b></button>
            </form>
        </div>
    </div>
@stop
