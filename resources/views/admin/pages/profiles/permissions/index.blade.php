@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Permissões do Perfil {{$profile->name}}</a></li>
        </ol>
    </nav>

    <h1>Permissões do Perfil {{$profile->name}}</h1>
@stop

@section('content')
    <a href="{{route('profiles.create')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" metohd="post" class="form-inline">
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
                    <th width="250">Ações</th>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td>
                                {{-- <a href="{{route('profiles.permissions.show', $permission->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('profiles.permissions.edit', $permission->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('profiles.permissions.permissions', $permission->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a> --}}
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