@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
        </ol>
    </nav>

    <h1>Planos</h1>
@stop

@section('content')
    <a href="{{route('plans.create')}}" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Adicionar</a>

    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" metohd="post" class="form-inline">
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
                    <th>Preço</th>
                    <th width="250">Ações</th>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>R${{number_format($plan->price, 2, ',', '.')}}</td>
                            <td>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-info">Detalhes</a>
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-secondary">Editar</a>
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