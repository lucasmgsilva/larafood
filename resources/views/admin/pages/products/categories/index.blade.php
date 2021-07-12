@extends('adminlte::page')

@section('title', "Categorias do Produto {$product->title}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Categorias do Produto {{$product->title}}</a></li>
            
        </ol>
    </nav>

    <h1>Categorias do Produto {{$product->title}}</h1>
@stop

@section('content')
    <a href="{{route('products.categories.available', $product->id)}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('categories.search')}}" metohd="post" class="form-inline">
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
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="50">Ações</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="{{route('products.categories.detach', [$product->id, $category->id])}}" class="btn btn-danger">Remover</a>
                                {{-- <a href="{{route('categories.categories.edit', $category->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('categories.categories.categories', $category->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $categories->appends($filters)->links(): $categories->links()}}
        </div>
    </div>
@stop