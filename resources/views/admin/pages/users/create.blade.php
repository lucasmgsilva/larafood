@extends('adminlte::page')

@section('title', 'Cadastrar Usuário')

@section('content_header')
    <h1>Cadastrar Usuário</h1>
@stop

@section('content')
    {{-- <a href="{{route('users.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST">
                @include('admin.pages.users._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
