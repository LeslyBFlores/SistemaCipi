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
    <a href="{{route('projects.create')}}" class="btn btn-primary">Nuevo Proyecto</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre del proyecto</th>
                <th>Responsable</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->nombre_proyecto}}</td>
                    <td>{{$project->nombre}}</td>
                    <td class="text-center">
                        <a href="{{route('projects.edit',$project->id)}}" class="btn btn-warning">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$projects->links()}}

@endsection

