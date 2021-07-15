@extends('adminlte::page')

@section('title', 'Cadastrar Cargo')

@section('content_header')
    <h1>Cadastrar Cargo</h1>
@stop

@section('content')
    {{-- <a href="{{route('roles.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST">
                @include('admin.pages.roles._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
