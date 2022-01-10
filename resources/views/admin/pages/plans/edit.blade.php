@extends('adminlte::page')

@section('title', "Editar Plano: {$plan->name}")

@section('content_header')
    <h1><strong>EDIÇÃO DO PLANO:</strong> {{$plan->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">PLANOS</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.edit', $plan->url)}}" class="active">EDITAR</a></li>
    </ol>
    <hr>
@endsection

@section('content')
    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{route('plans.update', $plan->url)}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
