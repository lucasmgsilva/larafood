@extends('adminlte::page')

@section('title', "Editar o Detalhe do Plano {$detail->name}")

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active"><a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}">Editar</a></li>
        </ol>
    </nav>

    <h1>Editar o Detalhe do Plano {{$detail->name}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('details.plan.update', [$plan->url, $detail->id])}}" method="POST">
            @method('PUT')
            @include('admin.pages.plans.details._partials.form')
            <input type="submit" value="Salvar" class="btn btn-primary">
        </form>
    </div>
</div>
@stop