@extends('adminlte::page')

@section('title', 'Editar Cargo')

@section('content_header')
    <h1>Editar Cargo</h1>
@stop

@section('content')
    {{-- <a href="{{route('roles.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.update', $role->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.roles._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
