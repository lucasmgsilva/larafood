@extends('adminlte::page')

@section('title', 'Cadastrar Perfil')

@section('content_header')
    <h1>Cadastrar Perfil</h1>
@stop

@section('content')
    {{-- <a href="{{route('profiles.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('profiles.store')}}" method="POST">
                @include('admin.pages.profiles._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
