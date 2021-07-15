@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('tenants.index')}}">Empresas</a></li>
        </ol>
    </nav>

    <h1>Empresas</h1>
@stop

@section('content')
    <a href="{{route('tenants.create')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('tenants.search')}}" metohd="post" class="form-inline">
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
                    <th width="100" style="max-width: 90px;">Logo</th>
                    <th>Título</th>
                    <th width="300">Ações</th>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant) 
                        <tr>
                            <td><img src="{{ url("storage/{$tenant->logo}") }}" alt="{{$tenant->name}}" style="max-width: 90px"></td>
                            <td>{{$tenant->name}}</td>
                            <td>
                                <a href="{{route('tenants.show', $tenant->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('tenants.edit', $tenant->id)}}" class="btn btn-secondary">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $tenants->appends($filters)->links(): $tenants->links()}}
        </div>
    </div>
@stop