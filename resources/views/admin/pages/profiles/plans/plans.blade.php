@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
    <h1><strong>PLANOS DO PERFIL: </strong>{{$profile->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.plans', $profile->id)}}" class="active">PLANOS DO PERFIL</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td class="text-center">{{$plan->id}}</td>
                            <td class="text-center">{{$plan->name}}</td>
                            <td class="text-center" style="width=350px">
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}" class="btn btn-outline-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@endsection
