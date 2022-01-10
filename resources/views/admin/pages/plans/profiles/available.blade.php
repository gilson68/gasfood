@extends('adminlte::page')

@section('title', "Perfis disponíveis para {$plan->name}")

@section('content_header')
    <h1><strong>PERFIL DISPONÍVEL PARA O PLANO:</strong> {{$plan->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.profiles', $plan->id)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles.available', $plan->id)}}" class="active">VINCULAR</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-header">
            <form action="{{route('plans.profiles.available', $plan->id)}}" method="POST" class=" form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Pesquisar" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"></th>
                        <th class="text-center"><b>Nome</b></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('plans.profiles.attach', $plan->id)}}" method="POST">
                        @csrf
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    <input type="checkbox" name="profiles[]" value="{{$profile->id}}">
                                </td>
                                <td>{{$profile->name}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-outline-success">VINCULAR</button>
                            </td>
                        </tr>
                    </form>
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
