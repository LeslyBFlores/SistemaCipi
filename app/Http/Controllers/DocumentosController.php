<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Documento;
use App\Categoria;
use App\Proceso;
use App\Proyecto;
use App\Comentario;
use Auth;

class DocumentosController extends Controller
{

    public function index()
    {
        $documentos = DB::table('documentos')
        ->join('categorias', 'documentos.id_categoria', '=', 'categorias.id')
        ->join('procesos', 'documentos.id_proceso', '=', 'procesos.id')
        ->join('proyectos', 'documentos.id_proyecto', '=', 'proyectos.id')
        ->join('users', 'documentos.id_user', '=', 'users.id')
        ->select('documentos.*', 'categorias.categoria', 'procesos.proceso', 'proyectos.nombre_proyecto', 'users.nombre', 'users.Ap_paterno', 'users.Ap_materno')
        ->where('documentos.id_user', '=' , Auth::id())
        ->paginate(15);
        return view ('documents.index', compact('documentos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proyectos = Proyecto::all();
        return view('documents.create', compact('categorias'), compact('proyectos'));
    }

    public function getFase($categoria) {
        $procesos = Proceso::where('id_categoria', $categoria)->get();
        return [
            'procesos' => $procesos,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'proceso' => 'required',
            'proyecto' => 'required',
            'documento' => 'required',
            'tipo' => 'required'
        ]);

        $file = $request->file('documento')->store('public');

        $nombre_doc = $request->file('documento')->getClientOriginalName();
        //$nombre_doc = 'nombre';

        Documento::create([
            'id_categoria' => $request['categoria'],
            'id_proceso' => $request['proceso'],
            'id_proyecto' => $request['proyecto'],
            'id_user' => Auth::id(),
            'documento' => $file,
            'nombre_documento' => $nombre_doc,
            'tipo' => $request['tipo']
        ]);

        return redirect('/users/documents')->with('success', 'Document has been added');
    }

    public function show($id)
    {
        $documento = DB::table('documentos')
        ->join('categorias', 'documentos.id_categoria', '=', 'categorias.id')
        ->join('procesos', 'documentos.id_proceso', '=', 'procesos.id')
        ->join('proyectos', 'documentos.id_proyecto', '=', 'proyectos.id')
        ->join('users', 'documentos.id_user', '=', 'users.id')
        ->select('documentos.*', 'categorias.categoria', 'procesos.proceso', 'proyectos.nombre_proyecto', 'users.nombre', 'users.Ap_paterno', 'users.Ap_materno')
        ->where('documentos.id', '=' , $id)
        ->get();

        $comentarios = Comentario::where('id_documento', '=', $id)
        ->join('users', 'comentarios.id_user', '=', 'users.id')
        ->select('comentarios.*', 'users.nombre', 'users.Ap_paterno', 'users.Ap_materno')
        ->paginate(10);

        return view('documents.show', ['documento' => $documento, 'comentarios' => $comentarios]);
    }

}
