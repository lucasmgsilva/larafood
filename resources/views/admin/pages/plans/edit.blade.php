@extends('adminlte::page')

@section('title', 'Cadastrar Plano')

@section('content_header')
    <h1>Editar Plano</h1>
@stop

@section('content')
    {{-- <a href="{{route('plans.create')}}" class="btn btn-danger">Novo</a> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.update', $plan->url)}}" method="POST">
                @method('PUT')
                @include('admin.pages.plans._partials.form')
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@stop
