@extends('adminlte::page')

@section('title', 'Cadastrar Empresas')

@section('content_header')
    <h1>Cadastrar Empresas</h1>
@stop

@section('content')
    {{-- <a href="{{route('tenants.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('tenants.store')}}" method="POST" enctype="multipart/form-data">
                @include('admin.pages.tenants._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
