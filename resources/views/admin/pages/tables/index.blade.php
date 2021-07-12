@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('tables.index')}}">Mesas</a></li>
        </ol>
    </nav>

    <h1>Mesas</h1>
@stop

@section('content')
    <a href="{{route('tables.create')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('tables.search')}}" metohd="post" class="form-inline">
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
                    <th>Identify</th>
                    <th>Descrição</th>
                    <th width="300">Ações</th>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>{{$table->identify}}</td>
                            <td>{{$table->description}}</td>
                            <td>
                                <a href="{{route('tables.show', $table->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('tables.edit', $table->id)}}" class="btn btn-secondary">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $tables->appends($filters)->links(): $tables->links()}}
        </div>
    </div>
@stop