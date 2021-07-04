@extends('adminlte::page')

@section('title', "Perfis disponíveis para o Plano {$plan->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Perfis</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Perfis do Plano {{$plan->name}}</a></li>
        </ol>
    </nav>

    <h1>Perfis disponíveis para o Plano {{$plan->name}}</h1>
@stop

@section('content')
    {{-- <a href="{{route(''plans.permissions.available'')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a> --}}

    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.profiles.available', $plan->id)}}" metohd="post" class="form-inline">
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
                    <form action="{{route('plans.profiles.attach', $plan->id)}}" method="POST">
                        @csrf
                        @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                            </td>
                            <td>{{$profile->name}}</td>
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
            {{ isset($filters) ? $profiles->appends($filters)->links(): $profiles->links()}}
        </div>
    </div>
@stop