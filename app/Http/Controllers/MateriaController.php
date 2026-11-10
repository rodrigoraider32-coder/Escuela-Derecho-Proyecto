<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriaController extends Controller
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
        ]);

        Materias::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    // Formulario para editar materia
    public function edit(Materias $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    // Actualizar materia en la BD
    public function update(Request $request, Materias $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave'  => 'required|string|unique:materias,clave,' . $materia->id,
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    // Eliminar materia
    public function destroy(Materias $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada.');
    }
}