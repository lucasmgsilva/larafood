@extends('adminlte::page')

@section('title', 'Cadastrar Produtos')

@section('content_header')
    <h1>Cadastrar Produtos</h1>
@stop

@section('content')
    {{-- <a href="{{route('products.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @include('admin.pages.products._partials.form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
