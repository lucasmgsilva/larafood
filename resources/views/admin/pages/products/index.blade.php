@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
        </ol>
    </nav>

    <h1>Produtos</h1>
@stop

@section('content')
    <a href="{{route('products.create')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('products.search')}}" metohd="post" class="form-inline">
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
                    <th width="100" style="max-width: 90px;">Imagem</th>
                    <th>Título</th>
                    <th width="300">Ações</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ url("storage/{$product->image}") }}" alt="{{$product->title}}" style="max-width: 90px"></td>
                            <td>{{$product->title}}</td>
                            <td>
                                <a href="{{route('products.categories.index', $product->id)}}" class="btn btn-warning" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="{{route('products.show', $product->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-secondary">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $products->appends($filters)->links(): $products->links()}}
        </div>
    </div>
@stop