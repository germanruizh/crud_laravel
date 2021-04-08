<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    // Listado de usuarios
    public function list() {
        $data['users'] = Usuario::paginate(3);
        return view('usuarios.listar', $data);
    }

    // Formulario de usuarios
    public function userForm() {
        return view('usuarios.userform');
    }
    // Guardar usuarios
    public function save(Request $request) {

        $validator = $this->validate($request, [
            'nombre'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:usuarios',
            'apellido'=>'required|string|max:255',
            'cedula'=>'required|string|max:10|unique:usuarios',
            'nombre'=>'required|string|max:255',
            'telefono'=>'required|string|max:10'
        ]);
        $userdata = request()->except('_token');
        Usuario::insert($userdata);
        return back()->with('usuarioGuardado', 'Usuario guardado');
    }
    // Eliminar usuarios
    public function delete($id) {
        Usuario::destroy($id);
        return back()->with('usuarioEliminado', 'Usuario eliminado');
    }
    // Formulario para editar usuarios
    public function editform($id) {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.editform', compact('usuario'));
    }
    //Edicion de usuarios
    public function edit(Request $request, $id) {
        $validator = $this->validate($request, [
            'nombre'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:usuarios',
            'apellido'=>'required|string|max:255',
            'cedula'=>'required|string|max:10|unique:usuarios',
            'nombre'=>'required|string|max:255',
            'telefono'=>'required|string|max:10'
        ]);
        $datosUsuario = request()->except(['_token', '_method']);
        Usuario::where('id', '=', $id)->update($datosUsuario);
        return back()-> with('usuarioModificado', 'Usuario modificado');
    }
}
