@extends('adminlte::page')

@section('title', "Perfis do Plano {$plan->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Perfis do Plano {{$plan->name}}</a></li>
            
        </ol>
    </nav>

    <h1>Perfis do Plano {{$plan->name}}</h1>
@stop

@section('content')
    <a href="{{route('plans.profiles.available', $plan->id)}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

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
                    <th width="50">Ações</th>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->description}}</td>
                            <td>
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}" class="btn btn-danger">Remover</a>
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