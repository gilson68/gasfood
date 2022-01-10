@extends('adminlte::page')

@section('title', "Detalhes do Plano: {$plan->name}")

@section('content_header')
    <h1><strong>DETALHES DO PLANO:</strong> {{$plan->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.show', $plan->url)}}" class="active">DETALHES</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <ul>
                <li><strong>ID:</strong> {{$plan->id}}</li>
                <li><strong>Plano:</strong> {{$plan->name}}</li>
                <li><strong>URL:</strong> {{$plan->url}}</li>
                <li><strong>Preço:</strong> R$ {{number_format($plan->price, 2, ',', '.')}}</li>
                <li><strong>Descrição:</strong> {{$plan->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-outline-danger">
                    <i class="fas fa-trash-alt"></i>
                    <strong>EXCLUIR</strong>
                </button>
            </form>
        </div>
    </div>
@endsection
