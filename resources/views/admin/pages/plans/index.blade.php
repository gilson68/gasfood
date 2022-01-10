@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1><strong>PLANOS</strong></h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}" class="active">PLANOS</a></li>
    </ol>
    <hr>
    <p>
        <a href="{{route('plans.create')}}" class="btn btn-outline-primary"><strong>ADICIONAR</strong></a>
    </p>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class=" form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-hover table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center" width="350">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td class="text-center">{{ $plan->id }}</td>
                            <td class="text-center">{{ $plan->name }}</td>
                            <td class="text-center"> R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td class="text-center" style="width=350px">
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-outline-light">EDITAR</a>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-outline-primary">VER</a>
                                <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-outline-success">DETALHES</a>
                                <a href="{{route('plans.profiles',$plan->id)}}" class="btn btn-outline-warning"><i class="fas as fa-user-tie"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection










