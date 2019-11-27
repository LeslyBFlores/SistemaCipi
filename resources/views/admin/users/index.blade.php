@extends('layout.layout')

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div><br />
    @endif
    <a href="{{route('admin.users.create')}}" class="btn btn-primary">Nuevo Usuario</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Rol</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->nombre}}</td>
                    <td>{{$user->Ap_paterno}}</td>
                    <td>{{$user->Ap_materno}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger {{$user->name == 'Administrador' ? 'disabled' : '' }}" type="submit" {{$user->nombre == 'Admin' ? 'disabled' : '' }}>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@endsection

