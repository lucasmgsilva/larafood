@extends('adminlte::page')

@section('title', 'Cadastrar Categorias')

@section('content_header')
    <h1>Cadastrar Categorias</h1>
@stop

@section('content')
    {{-- <a href="{{route('categories.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST">
                @include('admin.pages.categories._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
