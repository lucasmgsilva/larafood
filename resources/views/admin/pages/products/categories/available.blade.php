@extends('adminlte::page')

@section('title', "Categorias disponíveis para o Produto {$product->title}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Categorias do Produto {{$product->title}}</a></li>
        </ol>
    </nav>

    <h1>Categorias disponíveis para o Produto {{$product->title}}</h1>
@stop

@section('content')
    {{-- <a href="{{route(''plans.permissions.available'')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a> --}}

    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.categories.available', $product->id)}}" metohd="post" class="form-inline">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Pesquisar" name="filter" id="filter" class="form-control" value="{{$filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </thead>
                <tbody>
                    <form action="{{route('plans.categories.attach', $product->id)}}" method="POST">
                        @csrf
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="categories[]" value="{{$category->id}}">
                            </td>
                            <td>{{$category->title}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="2">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $categories->appends($filters)->links(): $categories->links()}}
        </div>
    </div>
@stop