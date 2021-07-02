@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>Editar Perfil</h1>
@stop

@section('content')
    {{-- <a href="{{route('profiles.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('profiles.update', $profile->id)}}" method="POST">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop
