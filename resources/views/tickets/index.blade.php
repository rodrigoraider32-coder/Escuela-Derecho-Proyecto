<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Tickets de Soporte') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Panel General de Tickets</h1>

        <div class="flex space-x-2 mb-6 border-b pb-2">
            
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'alumno')
                <a href="{{ route('tickets.index', ['type' => 'alumno_admin']) }}" 
                   class="px-4 py-2 rounded-t font-semibold {{ $tipo == 'alumno_admin' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Dirigidos a Administración
                </a>
            @endif

            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'alumno')
                <a href="{{ route('tickets.index', ['type' => 'alumno_maestro']) }}" 
                   class="px-4 py-2 rounded-t font-semibold {{ $tipo == 'alumno_maestro' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Dirigidos a Profesores
                </a>
            @endif

            <a href="{{ route('tickets.index', ['type' => 'todos']) }}" 
               class="px-4 py-2 rounded-t font-semibold {{ $tipo == 'todos' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                @if(auth()->user()->role === 'maestro')
                    Mis Tickets Recibidos
                @elseif(auth()->user()->role === 'alumno')
                    Todos mis Tickets
                @else
                    Ver Todos (Global)
                @endif
            </a>

        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="border p-2">Alumno</th>
                        <th class="border p-2">Destinatario / Profesor</th>
                        <th class="border p-2">Título</th>
                        <th class="border p-2">Tipo</th>
                        <th class="border p-2">Estado</th>
                        <th class="border p-2">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $ticket)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">{{ $ticket->student->name ?? 'N/A' }}</td>
                            <td class="border p-2">
                                @if($ticket->type === 'alumno_maestro')
                                    <span class="text-blue-700 font-medium">{{ $ticket->teacher->name ?? 'Sin asignar' }}</span>
                                @else
                                    <span class="text-gray-500 italic">Administración General</span>
                                @endif
                            </td>
                            <td class="border p-2 font-semibold">{{ $ticket->titulo }}</td>
                            <td class="border p-2">
                                <span class="text-xs px-2 py-1 rounded bg-gray-200 font-mono">
                                    {{ $ticket->type }}
                                </span>
                            </td>
                            <td class="border p-2">
                                <span class="px-2 py-1 text-xs rounded font-semibold text-white 
                                    {{ $ticket->status == 'pendiente' ? 'bg-red-500' : ($ticket->status == 'en_proceso' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                    {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                                </span>
                            </td>
                            <td class="border p-2 text-sm text-gray-600">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                            <td class="border p-2 font-semibold">
                                <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-600 hover:underline">
                                    {{ $ticket->titulo }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-6 text-gray-500">
                                No hay tickets registrados bajo este filtro.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>