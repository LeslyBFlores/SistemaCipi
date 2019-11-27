@extends('layout.layout')

@section('content')

    <h1 class="text-center">
        @foreach ($proceso as $item)
            {{$item->categoria}}
        @endforeach
    </h1>

    @if(session()->get('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div><br />
    @endif

    @forelse ($documentos as $documento)
    <div class="drive-wrapper drive-grid-view">
            <div class="grid-items-wrapper">
                @foreach ($documentos as $documento)
                <div class="drive-item module text-center">
                        <div class="drive-item-inner module-inner">
                            <div class="drive-item-title"><a href="{{route('documents.res.show', $documento->id)}}">{{$documento->nombre_documento}}</a></div>
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
                            <li>
                                <form action="{{ route('documents.res.destroy', $documento->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Eliminar</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center" role="alert">
            No hay documentos en esta fase
        </div>
    @endforelse

    {{$documentos->links()}}

    <br>

    <a class="btn btn-primary col-md-2 btn-block" href="{{ URL::previous() }}">Atras</a>


@endsection

