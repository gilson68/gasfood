@extends('adminlte::page')

@section('title', "Perfil da Permissão: {$permission->name}")

@section('content_header')
    <h1><strong>PERFIL DA PERMISSÃO:</strong> {{$permission->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">PERMISSÃO</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.profiles', $permission->id)}}" class="active">PERFIL DA PERMISSÃO</a></li>
    </ol>
    <hr>
@stop

@section('content')
    <div class="card bg-dark">
        <div class="card-body">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th class="text-center" width="75"><b>#</b></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td class="text-center">{{$profile->id}}</td>
                            <td class="text-center">{{$profile->name}}</td>
                            <td class="text-center" style="width=350px">
                                <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-outline-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@endsection
