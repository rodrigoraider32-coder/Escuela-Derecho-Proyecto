<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $usuarios = User::where('role', 'alumno')->paginate(10);
        
        if($user->role === 'maestro'){
            $usuarios = User::where('role', 'alumno')->paginate(10);
            return view('dashboard.maestro', compact('usuarios'));
        }
        if($user->role === 'alumno'){
            return view('dashboard.alumno', compact('user'));
	    }
        if($user->role === 'admin'){
            $alumnos = User::where('role', 'alumno')->paginate(10);
            $maestros = User::where('role', 'maestro')->paginate(10);
            return view('dashboard.admin', compact('alumnos', 'maestros'));
        }

        return abort(403, 'Tu cuenta no tiene un rol válido asignado.');
    }

    public function admin()
    {
        $tickets = Ticket::with('user')->latest()->get();
        return view('dashboard.admin', compact('tickets'));
    }
}
