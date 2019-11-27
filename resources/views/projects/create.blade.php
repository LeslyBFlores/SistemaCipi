@extends('layout.layout')

@section('content')
    <h1 class="text-center">Nuevo Proyecto</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
  @endif
  <form method="post" action="{{ route('projects.store') }}">
    <div class="form-group">
        @csrf
        <label for="nombre_proyecto">Nombre del proyecto:</label>
        <input type="text" class="form-control" name="nombre" required/>
    </div>
    <div class="form-group">
        <label for="responsable">Responsable</label>
        <select name="responsable" id="" class="form-control" required>
            <option value="">Seleccione...</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
      <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Agregar</button></div>
      <div class="col-md-6"><a href="{{url()->previous()}}" class="btn btn-danger btn-block">Cancelar</a></div>
    </div>
</form>

@endsection

