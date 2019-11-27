@extends('layout.layout')

@section('content')
    <h1 class="text-center">Editar Usuario</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
  @endif
  <form method="post" action="{{ route('admin.users.update') }}">
        @method('PUT')
        @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="{{$user->nombre}}" required/>
    </div>
    <div class="form-group">
        <label for=">Ap_paterno">Apellido Paterno:</label>
        <input type="text" class="form-control" name="Ap_paterno" value="{{$user->Ap_paterno}}" required/>
    </div>
    <div class="form-group">
        <label for="Ap_materno">Apellido Materno:</label>
        <input type="text" class="form-control" name="Ap_materno" value="{{$user->Ap_materno}}" required/>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}" required/>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" minlength="6"/>
    </div>
    <div class="form-group">
        <label for="Rol">Rol</label>
        <select name="rol" id="" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
      <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Actualizar</button></div>
      <div class="col-md-6"><a href="{{url()->previous()}}" class="btn btn-danger btn-block">Cancelar</a></div>
    </div>
</form>
@endsection

