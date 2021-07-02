@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <h1>Editar Permissão</h1>
@stop

@section('content')
    {{-- <a href="{{route('permissions.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.update', $permission->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
