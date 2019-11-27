@extends('layout.layout')

@section('content')
    <h1 class="text-center">Nuevo Documento</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
  @endif
  <form method="post" action="{{ route('documents.store') }}" files="true" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="categoria">Proceso</label>
        <select name="categoria" id="categoria" class="form-control" required>
            <option value="">Seleccione...</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="proceso">Fase</label>
        <select name="proceso" id="" class="form-control" required>
        </select>
    </div>
    <div class="form-group">
        <label for="proyecto">Proyecto</label>
        <select name="proyecto" id="" class="form-control" required>
            <option value="">Seleccione...</option>
            @foreach ($proyectos as $proyecto)
                <option value="{{$proyecto->id}}">{{$proyecto->nombre_proyecto}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Documento</label>
        <input type="file" name="documento" id="" class="form-control" accept=".doc, .docx, .pdf" required>
    </div>
    <div class="form-group">
        <label for="">Tipo de Documento</label>
        <select name="tipo" id="" class="form-control">
            <option value="">Seleccione...</option>
            <option value="Salida">Salida</option>
            <option value="Interno">Interno</option>
        </select>
    </div>
    <div class="row">
      <div class="col-md-6"><button type="submit" class="btn btn-primary btn-block">Agregar</button></div>
      <div class="col-md-6"><a href="{{url()->previous()}}" class="btn btn-danger btn-block">Cancelar</a></div>
    </div>
</form>

@endsection

