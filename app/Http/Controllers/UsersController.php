<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class UsersController extends Controller
{

    public function index()
    {
        $users = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=' , 'roles.id')
        ->select('users.*', 'roles.name')
        ->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'Ap_paterno' => 'required|string',
            'Ap_materno' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:6',
            'rol' => 'required'
        ]);

        $user = User::create([
            'nombre' => $request['nombre'],
            'Ap_paterno' => $request['Ap_paterno'],
            'Ap_materno' => $request['Ap_materno'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        DB::table('role_user')->insert([
            'role_id' => $request['rol'],
            'user_id' => $user['id']
        ]);

        return redirect('/admin/users')->with('success', 'User has been added');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = DB::table('roles')->get();
        return view('admin.users.edit', compact('user'), compact('roles'));
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        if($request['password'] === "" || $request['password'] === " " || $request['password'] === null){

            if($request['rol'] === ""){
                $request->validate([
                    'nombre' => 'required|string',
                    'Ap_paterno' => 'required|string',
                    'Ap_materno' => 'required|string',
                    'email' => 'required',
                ]);
                $user = User::findOrFail($id)->update([
                    'nombre' => $request['nombre'],
                    'Ap_paterno' => $request['Ap_paterno'],
                    'Ap_materno' => $request['Ap_materno'],
                    'email' => $request['email']
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required|string',
                    'Ap_paterno' => 'required|string',
                    'Ap_materno' => 'required|string',
                    'email' => 'required',
                    'rol' => 'required'
                ]);
                $user = User::findOrFail($id)->update([
                    'nombre' => $request['nombre'],
                    'Ap_paterno' => $request['Ap_paterno'],
                    'Ap_materno' => $request['Ap_materno'],
                    'email' => $request['email']
                ]);
                DB::table('role_user')
                ->where('user_id', $id)
                ->update([
                    'role_id' => $request['rol']
                ]);
            }

            return redirect('/admin/users')->with('success', 'User has been updated');
        }else{

            if($request['rol'] === ""){
                $request->validate([
                    'nombre' => 'required|string',
                    'Ap_paterno' => 'required|string',
                    'Ap_materno' => 'required|string',
                    'email' => 'required',
                    'password' => 'required|string'
                ]);
                $user = User::findOrFail($id)->update([
                    'nombre' => $request['nombre'],
                    'Ap_paterno' => $request['Ap_paterno'],
                    'Ap_materno' => $request['Ap_materno'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password'])
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required|string',
                    'Ap_paterno' => 'required|string',
                    'Ap_materno' => 'required|string',
                    'email' => 'required',
                    'password' => 'required|string',
                    'rol' => 'required'
                ]);
                $user = User::findOrFail($id)->update([
                    'nombre' => $request['nombre'],
                    'Ap_paterno' => $request['Ap_paterno'],
                    'Ap_materno' => $request['Ap_materno'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password'])
                ]);
                DB::table('role_user')
                ->where('user_id', $id)
                ->update([
                    'role_id' => $request['rol']
                ]);
            }

            return redirect('/admin/users')->with('success', 'User has been updated');
        }

    }

    public function destroy($id)
    {
        $user= User::findOrFail($id)->delete();
        return redirect('/admin/users')->with('success', 'User has been deleted Successfully');
    }
}
