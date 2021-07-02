@extends('adminlte::page')

@section('title', 'Cadastrar Permissão')

@section('content_header')
    <h1>Cadastrar Permissão</h1>
@stop

@section('content')
    {{-- <a href="{{route('permissions.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="POST">
                @include('admin.pages.permissions._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
