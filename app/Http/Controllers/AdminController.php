<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Carreras;
use App\Models\User;

class AdminController extends Controller
{
    public function revisionCalificaciones()
    {
        $calificacionesPendientes = Calificacion::where('status', 'pendiente')
        ->with(['student.carrera', 'materia', 'teacher'])
        ->latest()
        ->get();

        return view('admin.revision', compact('calificacionesPendientes'));
    }

    public function aprobarCalificacion($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->update([
            'calificacion' => $calificacion->calificacion_propuesta,
            'status' => 'aprobado',
        ]);

        return redirect()->back()->with('success', 'Calificación aprobada exitosamente.');
    }

    public function rechazarCalificacion($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->update([
            'status' => 'rechazado', // Set status back to 'rechazado' when rejecting a proposed grade
        ]);

        return redirect()->back()->with('info', 'Calificación rechazada exitosamente.');
    }
}
