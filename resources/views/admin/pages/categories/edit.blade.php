@extends('adminlte::page')

@section('title', 'Cadastrar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    {{-- <a href="{{route('categories.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.update', $category->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.categories._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
