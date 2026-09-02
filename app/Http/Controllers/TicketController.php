<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketResponse;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $defaultTipo = $user->role === 'maestro' ? 'alumno_maestro' : 'todos';
        $tipo = $request->get('type', $defaultTipo);
        
        $query = Ticket::with(['student', 'teacher'])->latest();

        if ($user->role === 'alumno') {
            $query->where('alumno_id', $user->id);
        } elseif ($user->role === 'maestro') {
            $query->where('maestro_id', $user->id);
        }   if ($tipo && $tipo !== 'todos') {
            $query->where('type', $tipo);
        }

        $tickets = $query->get();
        return view('tickets.index', compact('tickets', 'tipo'));
    }

    public function create()
    {
        $maestros = User::where('role', 'maestro')->get();
        return view('tickets.create', compact('maestros'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'type' => 'required|in:alumno_admin,alumno_maestro',
            'maestro_id' => 'nullable|required_if:type,alumno_maestro|exists:users,id',
        ]);

        Ticket::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'type' => $validated['type'],
            'status' => 'pendiente',
            'alumno_id' => Auth::id(),
            'maestro_id' => $validated['type'] === 'alumno_maestro' ? $validated['maestro_id'] : null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Ticket creado exitosamente.');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $user = Auth::user();

        if ($user->role === 'maestro' && $ticket->maestro_id !== $user->id) {
            return redirect()->route('tickets.index')->with('error', 'No tienes permiso para actualizar este ticket.');
        }

        $validated = $request->validate([
            'status' => 'required|in:pendiente,en_proceso,resuelto',
        ]);

        $ticket->update(['status' => $validated['status']]);

        return redirect()->route('dashboard')->with('success', 'Estado del ticket actualizado exitosamente.');
    }

    public function show(Ticket $ticket)
    {
        $user = Auth::user();

        if ($user->role === 'alumno' && $ticket->alumno_id !== $user->id) {
            return redirect()->route('tickets.index')->with('error', 'No tienes permiso para ver este ticket.');
        }

        if ($user->role === 'maestro' && $ticket->maestro_id !== $user->id) {
            return redirect()->route('tickets.index')->with('error', 'No tienes permiso para ver este ticket.');
        }

        $ticket->load(['student', 'teacher', 'responses.user']);

        return view('tickets.show', compact('ticket'));
    }

    public function storeResponse(Request $request, Ticket $ticket)
    {
        $user = Auth::user();

        if ($user->role === 'alumno' && $ticket->alumno_id !== $user->id) {
            return redirect()->route('tickets.index')->with('error', 'No tienes permiso para responder a este ticket.');
        }

        if ($user->role === 'maestro' && $ticket->maestro_id !== $user->id) {
            return redirect()->route('tickets.index')->with('error', 'No tienes permiso para responder a este ticket.');
        }

        $validated = $request->validate([
            'message' => 'required|string',
            'status' => 'nullable|in:pendiente,en_proceso,resuelto',
        ]);

        TicketResponse::create([
            'ticket_id' => $ticket->id,
            'user_id' => $user->id,
            'message' => $validated['message'],
        ]);

        if($request->filled('status')) {
            $ticket->update(['status' => $validated['status']]);
        }

        return redirect()->route('tickets.index', $ticket)->with('success', 'Respuesta enviada exitosamente.');
    }
}
