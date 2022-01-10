@extends('adminlte::page')

@section('title', "Detalhes do Perfil: {$profile->name}")

@section('content_header')
    <h1><strong>DETALHES DO PERFIL:</strong> {{$profile->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.show', $profile->id)}}" class="active">DETALHES</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <ul>
                <li><strong>ID:</strong> {{$profile->id}}</li>
                <li><strong>Perfil:</strong> {{$profile->name}}</li>
                <li><strong>Descrição:</strong> {{$profile->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
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
