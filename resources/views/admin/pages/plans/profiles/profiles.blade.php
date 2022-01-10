@extends('adminlte::page')

@section('title', "Perfil do {$plan->name}")

@section('content_header')
    <h1><strong>PERFIL DO PLANO: </strong>{{$plan->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles', $plan->id)}}" class="active">PERFIL</a></li>
    </ol>
    <hr>
    <p>
        <a href="{{route('plans.profiles.available', $plan->id)}}" class="btn btn-outline-primary"><strong>ADICIONAR</strong></a>
    </p>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" width="350">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td class="text-center">{{$profile->id}}</td>
                            <td class="text-center">{{$profile->name}}</td>
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
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@endsection
