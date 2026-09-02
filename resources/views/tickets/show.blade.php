<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket #{{ $ticket->id }} - {{ $ticket->titulo }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 max-w-4xl">
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm text-gray-500">
                    Creado por: <strong>{{ $ticket->student->name ?? 'N/A' }}</strong> el {{ $ticket->created_at->format('d/m/Y H:i') }}
                </span>
                <span class="px-3 py-1 text-xs rounded text-white font-semibold
                    {{ $ticket->status == 'pendiente' ? 'bg-red-500' : ($ticket->status == 'en_proceso' ? 'bg-yellow-500' : 'bg-green-500') }}">
                    {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                </span>
            </div>
            <p class="text-gray-800 whitespace-pre-line">{{ $ticket->descripcion }}</p>
        </div>

        <h3 class="text-lg font-bold mb-4">Respuestas</h3>
        <div class="space-y-4 mb-6">
            @forelse($ticket->responses as $response)
                <div class="p-4 rounded-lg shadow-sm border {{ $response->user_id === auth()->id() ? 'bg-blue-50 border-blue-200 ml-8' : 'bg-white border-gray-200 mr-8' }}">
                    <div class="flex justify-between text-xs text-gray-500 mb-2">
                        <strong>{{ $response->user->name }} ({{ ucfirst($response->user->role) }})</strong>
                        <span>{{ $response->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <p class="text-gray-700 text-sm whitespace-pre-line">{{ $response->message }}</p>
                </div>
            @empty
                <p class="text-gray-500 italic">No hay respuestas en este ticket todavía.</p>
            @endforelse
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h4 class="font-semibold mb-3">Agregar Respuesta</h4>
            <form action="{{ route('tickets.storeResponse', $ticket) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <textarea name="message" rows="4" required placeholder="Escribe tu respuesta..." 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>

                @if(auth()->user()->role !== 'alumno')
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Actualizar Estado</label>
                        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="pendiente" {{ $ticket->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_proceso" {{ $ticket->status == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="resuelto" {{ $ticket->status == 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                        </select>
                    </div>
                @endif

                <div class="flex justify-end gap-2">
                    <a href="{{ route('tickets.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Volver</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Enviar Respuesta</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>