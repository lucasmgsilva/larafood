@extends('adminlte::page')

@section('title', 'Cadastrar Empresa')

@section('content_header')
    <h1>Editar Empresa</h1>
@stop

@section('content')
    {{-- <a href="{{route('tenants.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('tenants.update', $tenant->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.tenants._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
