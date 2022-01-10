@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <h1><strong>PERMISSÃO</strong></h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Início</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}" class="active">PERMISSÃO</a></li>
    </ol>
    <hr>
    <p>
        <a href="{{route('permissions.create')}}" class="btn btn-outline-primary"><strong>ADICIONAR</strong></a>
    </p>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-header">
            <form action="{{route('permissions.search')}}" method="POST" class=" form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Nome" value="">
                <button type="submit" class="btn btn-outline-light"><i class="fas fa-search"></i></button>
            </form>
        </div>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="text-center">{{$permission->id}}</td>
                            <td class="text-center">{{$permission->name}}</td>
                            <td class="text-center" style="width=350px">
                                <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-outline-light">EDITAR</a>
                                <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-outline-primary">VER</a>
                                <a href="{{route('permissions.profiles', $permission->id)}}" class="btn btn-outline-warning"><i class="fas fa-lock"></i></a>
                                <a href="#" class="btn btn-info"><i class="fas fa-list-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@endsection
