@extends('adminlte::page')

@section('title', "Detalhes {$detail->name}")

@section('content_header')
    <h1>Detalhes <b>{{$detail->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$detail->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('details.plan.destroy', [$plan->url, $detail->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir <b>{{$detail->name}}</b></button>
            </form>
        </div>
    </div>
@stop
