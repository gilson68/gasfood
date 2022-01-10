@extends('adminlte::page')

@section('title', "Editar Perfil: {$profile->name}")

@section('content_header')
    <h1><strong>EDIÇÃO DO PERFIL: </strong>{{$profile->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.edit', $profile->id)}}" class="active">EDITAR</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('profiles.update', $profile->id)}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection
