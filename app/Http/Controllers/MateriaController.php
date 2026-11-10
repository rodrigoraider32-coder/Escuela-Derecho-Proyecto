<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    // Mostrar la lista de materias
    public function index()
    {
        $materias = Materia::paginate(10);
        return view('materias.index', compact('materias'));
    }

    // Formulario para crear materia
    public function create()
    {
        return view('materias.create');
    }

    // Guardar una nueva materia en la BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|unique:materias,clave',
            // Agreguen aquí las validaciones adicionales (créditos, etc.)
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    // Formulario para editar materia
    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    // Actualizar materia en la BD
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|unique:materias,clave,' . $materia->id,
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    // Eliminar materia
    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada.');
    }
}  