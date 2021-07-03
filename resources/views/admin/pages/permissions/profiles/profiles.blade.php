@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis da Permissão {{$permission->name}}</a></li>
        </ol>
    </nav>

    <h1>Perfis da Permissão {{$permission->name}}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-danger">Remover</a>
                                {{-- <a href="{{route('profiles.profiles.edit', $profile->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('profiles.profiles.profiles', $profile->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $profiles->appends($filters)->links(): $profiles->links()}}
        </div>
    </div>
@stop