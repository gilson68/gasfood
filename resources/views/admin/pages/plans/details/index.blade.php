@extends('adminlte::page')

@section('title', "Detalhes do Plano: {$plan->name}")

@section('content_header')
    <h1><strong>DETALHES DO PLANO:</strong> {{$plan->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}" class="active">DETALHES DO PLANO</a></li>
    </ol>
    <hr>
    <p>
        <a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-outline-primary"><strong>ADICIONAR</strong></a>
    </p>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" width="350">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td class="text-center">{{ $detail->id }}</td>
                            <td class="text-center">{{ $detail->name }}</td>
                            <td class="text-center" style="width=350px">
                                <a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="btn btn-outline-light">EDITAR</a>
                                <a href="{{route('details.plan.show', [$plan->url, $detail->id])}}" class="btn btn-outline-primary">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@endsection
