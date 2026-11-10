<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        $materias = Materias::paginate(10);
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

        Materias::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    // Formulario para editar materia
    public function edit(Materias $materia)
    {
        return view('materias.edit', compact('materias'));
    }

    // Actualizar materia en la BD
    public function update(Request $request, Materias $materias)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|unique:materias,clave,' . $materias->id,
        ]);

        $materias->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    // Eliminar materia
    public function destroy(Materias $materias)
    {
        $materias->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada.');
    }
}  