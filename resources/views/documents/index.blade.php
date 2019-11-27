@extends('layout.layout')

@section('content')
    @can('documents.users')
        @if(session()->get('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div><br />
        @endif
        <a href="{{route('documents.create')}}" class="btn btn-primary">Nuevo Documento</a>
        <hr>
    @endcan

    <div class="drive-wrapper drive-grid-view">
        <div class="grid-items-wrapper">
            @foreach ($documentos as $documento)
            <div class="drive-item module text-center">
                    <div class="drive-item-inner module-inner">
                        <div class="drive-item-title"><a href="{{route('documents.show', $documento->id)}}">{{$documento->nombre_documento}}</a></div>
                        <div class="drive-item-thumb">
                            <a href="#"><i class="fa fa-file-text-o text-primary"></i></a>
                        </div>
                        <div class="text-center">Proceso: {{$documento->categoria}}</div>
                        <div class="text-center">Fase: {{$documento->proceso}}</div>
                        <div class="text-center">Proyecto: {{$documento->nombre_proyecto}}</div>
                        <div class="text-center">Tipo: {{$documento->tipo}}</div>
                        <div class="text-center">Usuario: {{$documento->nombre}} {{$documento->Ap_paterno}} {{$documento->Ap_materno}}</div>
                    </div>
                    <div class="drive-item-footer module-footer">
                        <ul class="utilities list-inline">
                        <li><a href="{{Storage::url($documento->documento)}}" data-toggle="tooltip" data-placement="top"        title="" data-original-title="Download" download="{{$documento->nombre_documento}}"><i class="fa fa-download"></i> Descargar</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{$documentos->links()}}


@endsection

