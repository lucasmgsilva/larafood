@extends('adminlte::page')

@section('title', 'Cadastrar Mesas')

@section('content_header')
    <h1>Cadastrar Mesas</h1>
@stop

@section('content')
    {{-- <a href="{{route('tables.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('tables.store')}}" method="POST">
                @include('admin.pages.tables._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
