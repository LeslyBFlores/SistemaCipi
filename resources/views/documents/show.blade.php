@extends('layout.layout')

@section('content')
    @foreach ($documento as $doc)
        <h1 class="text-center">{{$doc->nombre_documento}}</h1>

        @if(session()->get('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div><br />
        @endif

        <a href="{{Storage::url($doc->documento)}}" data-toggle="tooltip" data-placement="top"        title="" data-original-title="Download" download="{{$doc->nombre_documento}}" style="font-size:3em"><i class="fa fa-file-text-o" style="font-size:3em"></i> Descargar</a>
        <div>
            <br>
        <div>
            <h4>Proceso: {{$doc->categoria}}</h4>
            <h4>Fase: {{$doc->proceso}}</h4>
            <h4>Proyecto: {{$doc->nombre_proyecto}}</h4>
            <h4>Tipo: {{$doc->tipo}}</h4>
            <h4>Autor: {{$doc->nombre}} {{$doc->Ap_paterno}} {{$doc->Ap_materno}}</h4>
        </div>
        <br>
        <section class="comments">
            @foreach ($comentarios as $comentario)
                <article class="comment">
                    <a class="comment-img" href="#non">
                    <img src="https://pbs.twimg.com/profile_images/444197466133385216/UA08zh-B.jpeg" alt="" width="50" height="50">
                    </a>
                    <div class="comment-body">
                    <div class="text">
                        <p>{{$comentario->comentario}}</p>
                    </div>
                    <p class="attribution">by {{$comentario->nombre}} {{$comentario->Ap_paterno}} {{$comentario->Ap_materno}} at {{$comentario->created_at}}</p>
                    </div>
                </article>
            @endforeach
        </section>
        {{$comentarios->links()}}
        <br>
        <section class="comm">
            <form action="{{route('comm.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id_documento" value="{{$doc->id}}">
                <div class="form-group">
                    <textarea name="comentario" class="form-control" cols="30" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </form>
        </section >
    @endforeach

    <br>

@endsection

