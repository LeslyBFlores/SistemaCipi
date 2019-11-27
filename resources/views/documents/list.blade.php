@extends('layout.layout')

@section('content')

<h3 class="text-center">Documentos</h3>
<p>Seleccione el proceso del cual desea ver los documentos que han sido enviados</p>
<br>
<div class="row">
    <div class="col-sm-3">
        <a class="btn btn-primary" href="{{route('documents.res.list' , 1)}}">Gestión de Procesos</a>
    </div>
    <div class="col-sm-3">
        <a class="btn btn-primary" href="{{route('documents.res.list', 2)}}">Gestión de Proyectos</a>
    </div>
    <div class="col-sm-3">
        <a class="btn btn-primary" href="{{route('documents.res.list', 3)}}">Administración de Proyectos Específicos</a>
    </div>
    <div class="col-sm-3">
        <a class="btn btn-primary" href="{{route('documents.res.list', 4)}}">Desarrollo y Mantenimiento de Software</a>
    </div>
</div>


@endsection

