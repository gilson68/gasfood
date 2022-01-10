@extends('adminlte::page')

@section('title', 'Editar Detalhe do Plano: {$detail->name}')

@section('content_header')
    <h1><strong>EDIÇÃO DOS DETALHES DO PLANO:</strong> {{$detail->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="active">EDIÇÃO</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('details.plan.update', [$plan->url, $detail->id])}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
