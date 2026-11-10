<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::latest()->paginate(10);
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'clave' => 'required|string|max:20|unique:materias,clave',
            'creditos' => 'required|integer|min:1',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'clave' => 'required|string|max:20|unique:materias,clave,' . $materia->id,
            'creditos' => 'required|integer|min:1',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
