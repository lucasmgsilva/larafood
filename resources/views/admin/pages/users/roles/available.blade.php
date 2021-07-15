@extends('adminlte::page')

@section('title', "Cargos disponíveis para o Usuário {$user->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Cargos disponíveis para o Usuário {{$user->name}}</a></li>
        </ol>
    </nav>

    <h1>Cargos disponíveis para o Usuário {{$user->name}}</h1>
@stop

@section('content')
    {{-- <a href="{{route(''users.roles.available'')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a> --}}

    <div class="card">
        <div class="card-header">
            <form action="{{route('users.roles.available', $user->id)}}" metohd="post" class="form-inline">
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
                    <form action="{{route('users.roles.attach', $role->id)}}" method="POST">
                        @csrf
                        @foreach ($roles as $role)
                        <tr>
                            <td>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}">
                            </td>
                            <td>{{$role->name}}</td>
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
            {{ isset($filters) ? $roles->appends($filters)->links(): $roles->links()}}
        </div>
    </div>
@stop