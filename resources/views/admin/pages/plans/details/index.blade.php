@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
            <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
        </ol>
    </nav>

    <h1>Detalhes do Plano {{$plan->name}}</h1>
@stop

@section('content')
    <a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <th>Nome</th>
                    <th width="200">Ações</th>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{$detail->name}}</td>
                            <td>
                                <a href="{{route('details.plan.show', [$plan->url, $detail->id])}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="btn btn-secondary">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ isset($filters) ? $details->appends($filters)->links(): $details->links()}}
        </div>
    </div>
@stop