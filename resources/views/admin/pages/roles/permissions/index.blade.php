@extends('adminlte::page')

@section('title', "Permissões do Cargo {$role->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Permissões do Cargo {{$role->name}}</a></li>
        </ol>
    </nav>

    <h1>Permissões do Cargo {{$role->name}}</h1>
@stop

@section('content')
    <a href="{{route('roles.permissions.available', $role->id)}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.search')}}" metohd="post" class="form-inline">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td>
                                <a href="{{route('roles.permissions.detach', [$role->id, $permission->id])}}" class="btn btn-danger">Remover</a>
                                {{-- <a href="{{route('roles.permissions.edit', $permission->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('roles.permissions.permissions', $permission->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $permissions->appends($filters)->links(): $permissions->links()}}
        </div>
    </div>
@stop