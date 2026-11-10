<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Support\Facades\Auth;

class MaestroController extends Controller
{
    public function capturar()
    {
        $materias = Materia::all();
        $alumnos = User::where('role', 'alumno')->get();
        $misSolicitudes = Calificacion::where('teacher_id', Auth::id())
        ->with('student', 'materia')
        ->latest()
        ->get();
        return view('maestros.capturar', compact('materias', 'alumnos', 'misSolicitudes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'student_id' => 'required|exists:users,id',
            'calificacion_propuesta' => 'required|numeric|min:0|max:100',
            'periodo' => 'required|string',
            'exam_tipo' => 'required|string',
        ]);

        $existeAprobada = Calificacion::where('materia_id', $request->materia_id)
            ->where('student_id', $request->student_id)
            ->where('periodo', $request->periodo)
            ->where('status', 'aprobado')
            ->exists();

        if($existeAprobada){
            return redirect()->back()->withErrors(['msg' => 'La calificación para este periodo ya fue aprobada y no se puede modificar']);
        }

        Calificacion::updateOrCreate([
            'materia_id' => $request->materia_id,
            'student_id' => $request->student_id,
            'periodo' => $request->periodo,            
        ], [
            'exam_tipo' => $request->exam_tipo,
            'calificacion_propuesta' => $request->calificacion_propuesta,
            'teacher_id' => Auth::id(),
            'status' => 'pendiente', // Set status to 'pendiente' when capturing a grade
        ]);

        return redirect()->route('maestros.capturar')->with('success', 'Calificación capturada exitosamente.');
    }
}
