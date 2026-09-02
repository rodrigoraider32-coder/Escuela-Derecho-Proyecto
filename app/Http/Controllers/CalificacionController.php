<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calificacion;

class CalificacionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $calificaciones = Calificacion::where('student_id', $user->id)->get();

        return response()->json($calificaciones);
    }
}
