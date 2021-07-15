@extends('adminlte::page')

@section('title', 'Detalhes Empresa {{$tenant->name}}')

@section('content_header')
    <h1>Detalhes Empresa <b>{{$tenant->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Plano: </strong> {{$tenant->plan->name}}
                </li>
                <li>
                    <strong>Nome: </strong> {{$tenant->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$tenant->url}}
                </li>
                <li>
                    <strong>CNPJ: </strong> {{$tenant->cnpj}} 
                </li>
                <li>
                    <strong>Ativo: </strong> {{$tenant->active == 'Y' ? 'SIM' : 'NÃO'}} 
                </li>
            </ul>

            <hr>

            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong> {{$tenant->subscription}}
                </li>
                <li>
                    <strong>Data Expira: </strong> {{$tenant->expires_at}}
                </li>
                <li>
                    <strong>Identificador: </strong> {{$tenant->subscription_id}}
                </li>
                <li>
                    <strong>Ativo: </strong> {{$tenant->subscription_active ? 'SIM' : 'NÃO'}}
                </li>
                <li>
                    <strong>Cancelou? </strong> {{$tenant->subscription_suspended ? 'SIM' : 'NÃO'}}
                </li>
                
            </ul>
        </div>

    </div>
@stop
