@extends('adminlte::page')

@section('title', 'adicionar Novo Perfil')

@section('content_header')
    <h1><strong>CADASTRO DE PERFIL</strong></h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.create')}}" class="active">ADICIONAR</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('profiles.store')}}" method="POST" class="form">
                @csrf
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection
