@extends('adminlte::page')

@section('title', 'adicionar Novo Plano')

@section('content_header')
    <h1><strong>CADASTRO DE PLANO</strong></h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.create')}}" class="active">ADICIONAR</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <form action="{{route('plans.store')}}" method="POST" class="form">
                @csrf
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
