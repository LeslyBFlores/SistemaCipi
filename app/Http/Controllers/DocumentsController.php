<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Documento;
use Auth;

class DocumentsController extends Controller
{

    public function list() {
        return view('documents.list');
    }

    public function index($categoria)
    {
        $documentos = DB::table('documentos')
        ->join('categorias', 'documentos.id_categoria', '=', 'categorias.id')
        ->join('procesos', 'documentos.id_proceso', '=', 'procesos.id')
        ->join('proyectos', 'documentos.id_proyecto', '=', 'proyectos.id')
        ->join('users', 'documentos.id_user', '=', 'users.id')
        ->select('documentos.*', 'categorias.categoria', 'procesos.proceso', 'proyectos.nombre_proyecto', 'users.nombre', 'users.Ap_paterno', 'users.Ap_materno')
        ->where('proyectos.id_user', '=' , Auth::id())
        ->where('documentos.id_categoria', '=' , $categoria)
        ->paginate(15);

        $proceso = DB::table('documentos')
        ->join('categorias', 'documentos.id_categoria', '=', 'categorias.id')
        ->select('categorias.categoria')
        ->where('documentos.id_categoria', '=' , $categoria)
        ->get();

        return view ('documents.res', compact('documentos'), compact('proceso'));
    }

    public function destroy($id)
    {
        Documento::findOrFail($id)->delete();
        return redirect('/res/documents')->with('success', 'Document has been deleted Successfully');
    }
}
