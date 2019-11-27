<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proyecto;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects = DB::table('proyectos')
        ->join('users', 'proyectos.id_user', '=', 'users.id')
        ->select('users.nombre', 'proyectos.*')
        ->paginate(15);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=' , 'roles.id')
        ->where('roles.name', '=', 'Responsable')
        ->select('users.*')
        ->get();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'responsable' => 'required'
        ]);

        Proyecto::create([
            'nombre_proyecto' => $request['nombre'],
            'id_user' => $request['responsable']
        ]);

        return redirect('/projects')->with('success', 'Project has been added');
    }

    public function edit($id)
    {
        $project = Proyecto::findOrFail($id);
        $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=' , 'roles.id')
        ->where('roles.name', '=', 'Responsable')
        ->select('users.*')
        ->get();
        return view('projects.edit', compact('project'), compact('users'));
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        if ($request['responsable'] === "" || $request['responsable'] === " " || $request['responsable'] === null){

            $request->validate([
                'nombre' => 'required|string',
            ]);

            Proyecto::findOrFail($id)->update([
                'nombre_proyecto' => $request['nombre']
            ]);

            return redirect('/projects')->with('success', 'Project has been updated');
        }else{

            $request->validate([
                'nombre' => 'required|string',
                'responsable' => 'required'
            ]);

            Proyecto::findOrFail($id)->update([
                'nombre_proyecto' => $request['nombre'],
                'id_user' => $request['responsable']
            ]);

            return redirect('/projects')->with('success', 'Project has been updated');
        }
    }

    public function destroy($id)
    {
        Proyecto::findOrFail($id)->delete();
        return redirect('/projects')->with('success', 'Project has been deleted Successfully');
    }
}
