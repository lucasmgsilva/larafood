@extends('adminlte::page')

@section('title', "Planos do Perfil {$plan->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos do Perfil {{$plan->name}}</a></li>
        </ol>
    </nav>

    <h1>Planos do Perfil {{$plan->name}}</h1>
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
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>
                                <a href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}" class="btn btn-danger">Remover</a>
                                {{-- <a href="{{route('plans.plans.edit', $plan->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{route('plans.plans.plans', $plan->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $plans->appends($filters)->links(): $plans->links()}}
        </div>
    </div>
@stop