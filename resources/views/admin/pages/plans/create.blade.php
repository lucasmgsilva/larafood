@extends('adminlte::page')

@section('title', 'Cadastrar Plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
    {{-- <a href="{{route('plans.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-header">
            Filtros
        </div>
        <div class="card-body">
            <form action="{{route('plans.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Preço:</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Descrição:</label>
                    <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                </div>
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            {{-- {{ $plans->links()}} --}}
        </div>
    </div>
@stop
