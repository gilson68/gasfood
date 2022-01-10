@extends('adminlte::page')

@section('title', "Detalhes do Plano: {$detail->name}")

@section('content_header')
    <h1><strong>DETALHES DO PLANO:</strong> {{$detail->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">DETALHES DO PLANO</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}"></a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <ul>
                <li><strong>ID:</strong> {{$detail->id}}</li>
                <li><strong>Atributos:</strong> {{$detail->name}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{route('details.plan.destroy', [$plan->url, $detail->id])}}" method="POST">
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
