<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Auth;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_documento' => 'required|int',
            'comentario' => 'required|string'
        ]);

        Comentario::create([
            'id_documento' => $request['id_documento'],
            'id_user' => Auth::id(),
            'comentario' => $request['comentario']
        ]);

        return back()->with('success', 'Comment has been added');
    }
}
