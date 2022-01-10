@extends('adminlte::page')

@section('title', "Editar Perfil: {$permission->name}")

@section('content_header')
    <h1><strong>EDIÇÃO DA PERMISSÃO: </strong>{{$permission->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">PERMISSÃO</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.edit', $permission->id)}}" class="active">EDIÇÃO</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('permissions.update', $permission->id)}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
