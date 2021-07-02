@extends('adminlte::page')

@section('title', "Adicionar Detalhe ao Plano {$plan->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active"><a href="{{route('details.plan.create', $plan->url)}}">Novo</a></li>
        </ol>
    </nav>

    <h1>Adicionar Detalhe ao Plano {{$plan->name}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('details.plan.store', $plan->url)}}" method="POST">
            @include('admin.pages.plans.details._partials.form')
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>
    </div>
</div>
@stop