<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $usuarios = User::all();
        return view('usuarios.index',[ 'usuarios' => $usuarios ]);
    }

    public function create() {
        return view('usuarios.create');
    }

    public function edit($id) {
        return view('usuarios.edit',['user' => User::findOrFail($id) ]);
    }

    public function store(Request $request) {

        $user = new User;
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo_usuario = $request->input('tipo_usuario');
        $user->area = $request->input('area');
        $user->telefono = $request->input('telefonos');
        $user->save();

        return Redirect::to('usuarios')->with('message','Usuario agregado correctamente');
    }

    public function update(Request $request, $id) {
        $usuario_actual = Auth::user();

        $user = User::findOrFail($id);
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        if( $request->input('password') ) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->tipo_usuario = $request->input('tipo_usuario');
        $user->area = $request->input('area');
        $user->telefono = $request->input('telefonos');
        $user->update();

        return Redirect::to('usuarios')->with('message','Usuario actualizado correctamente.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::to('usuarios')->with('message','Usuario eliminado correctamente');
    }
}
