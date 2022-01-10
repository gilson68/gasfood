@extends('adminlte::page')

@section('title', 'Cadastro de Permissão')

@section('content_header')
    <h1><strong>CADASTRO DE PERMISSÃO</strong></h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">PERMISSÃO</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.create')}}" class="active">CADASTRO</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="POST" class="form">
                @csrf
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
