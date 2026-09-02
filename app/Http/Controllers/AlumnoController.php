<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumno',
        ]);

        return redirect()->route('dashboard')->with('success', 'Alumno, Añadido con exito');
    }

    public function index(){
        $usuario = User::where('role', 'alumno')->paginate(10);
        return view ('dashboard', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('alumnos.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$usuario->id,
            'password' => 'nullable|string|min:8',            
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if($request->filled('password')){
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('dashboard')->with('success', 'Alumno, Actualizado correctamente');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('dashboard')->with('success', 'Alumno, Eliminado de la clase');
    }

    public function misCalificaciones()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $calificaciones = $user->calificaciones()->with(['materia', 'teacher'])->get()->groupBy('materia_id');

        return view('alumnos.calificaciones', compact('calificaciones'));
    }
}
