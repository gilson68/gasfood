@extends('adminlte::page')

@section('title', "Permissões disponíveis: {$profile->name}")

@section('content_header')
    <h1><strong>PERMISSÕES DISPONÍVEL:</strong> {{$profile->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.permissions', $profile->id)}}">PERMISSÕES DISPONÍVEL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.permissions.available', $profile->id)}}" class="active">VINCULAR</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-header">
            <form action="{{route('profiles.permissions.available', $profile->id)}}" method="POST" class=" form form-inline">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Pesquisar" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('profiles.permissions.attach', $profile->id)}}" method="POST">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                </td>
                                <td>{{$permission->name}}</td>
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@endsection
