@extends('adminlte::page')

@section('title', "Permissões: {$profile->name}")

@section('content_header')
    <h1><strong>PERMISSÕES DO PERFIL:</strong> {{$profile->name}}</h1>
    <hr>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">INÍCIO</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">PERFIL</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.permissions', $profile->id)}}" class="active">PERMISSÕES DO PERFIL</a></li>
    </ol>
    <hr>
    <p>
        <a href="{{route('profiles.permissions.available', $profile->id)}}" class="btn btn-outline-primary"><strong>ADICIONAR</strong></a>
    </p>
@stop

@section('content')
    <div class="card bg-dark">
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
                                <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-outline-danger">DESVINCULAR</a>
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
