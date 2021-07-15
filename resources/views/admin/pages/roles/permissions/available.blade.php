@extends('adminlte::page')

@section('title', "Permissões disponíveis para o Cargo {$role->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Permissões disponíveis para o Cargo {{$role->name}}</a></li>
        </ol>
    </nav>

    <h1>Permissões disponíveis para o Cargo {{$role->name}}</h1>
@stop

@section('content')
    {{-- <a href="{{route(''roles.permissions.available'')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a> --}}

    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.permissions.available', $role->id)}}" metohd="post" class="form-inline">
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
                    <form action="{{route('roles.permissions.attach', $role->id)}}" method="POST">
                        @csrf
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            </td>
                            <td>{{$permission->name}}</td>
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
            {{ isset($filters) ? $permissions->appends($filters)->links(): $permissions->links()}}
        </div>
    </div>
@stop