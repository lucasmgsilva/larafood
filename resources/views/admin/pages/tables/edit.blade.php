@extends('adminlte::page')

@section('title', 'Cadastrar Mesa')

@section('content_header')
    <h1>Editar Mesa</h1>
@stop

@section('content')
    {{-- <a href="{{route('tables.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('tables.update', $table->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.tables._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
