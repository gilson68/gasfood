@extends('adminlte::page')

@section('title', "Detalhes da Permissão: {$permission->name}")

@section('content_header')
    <h1><strong>DETALHES DA PERMISSÃO:</strong> {{$permission->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">PERMISSÃO</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.show', $permission->id)}}" class="active">DETALHES</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <ul>
                <li><strong>ID:</strong> {{$permission->id}}</li>
                <li><strong>Permissão:</strong> {{$permission->name}}</li>
                <li><strong>Descrição:</strong> {{$permission->description}}</li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
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
