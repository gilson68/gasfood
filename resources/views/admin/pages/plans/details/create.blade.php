@extends('adminlte::page')

@section('title', "Adicionar Novo Detalhe ao plano: {$plan->name}")

@section('content_header')
    <h1><strong>CADASTRO DE DETALHES DO PLANO:</strong> {{ $plan->name }}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"> <a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.create', $plan->url)}}" class="active">ADICIONAR</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('details.plan.store', $plan->url)}}" method="POST" class="form">
                @csrf
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
