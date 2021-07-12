@extends('adminlte::page')

@section('title', 'Cadastrar Produto')

@section('content_header')
    <h1>Editar Produto</h1>
@stop

@section('content')
    {{-- <a href="{{route('products.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.products._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
