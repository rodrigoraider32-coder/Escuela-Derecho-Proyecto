<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Capturar Calificaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700 text-sm">
                    <strong>Nota:</strong> Las calificaciones ingresadas y modificadas entrarán en estado
                    <span class="font-semibold text-blue-600">pendiente</span> y serán reflejadas una vez aprobadas por el Administrador.
                </div>

                <form action="{{ route('maestros.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="materia_id" class="block text-sm font-medium text-gray-700">Materia</label>
                            <select name="materia_id" id="materia_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">-- Selecciona una materia --</option>
                                @foreach($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }} ({{ $materia->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Alumno</label>
                            <select name="student_id" id="student_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">-- Selecciona un alumno --</option>
                                @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">{{ $alumno->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="periodo" class="block text-sm font-medium text-gray-700">Periodo</label>
                            <select name="periodo" id="periodo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="Parcial 1">Parcial 1</option>
                                <option value="Parcial 2">Parcial 2</option>
                                <option value="Parcial 3">Parcial 3</option>
                                <option value="Ordinario">Ordinario</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="exam_tipo" class="block text-sm font-medium text-gray-700">Tipo de Examen</label>
                            <input type="text" name="exam_tipo" id="exam_tipo" value="Examen Escrito" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label for="calificacion_propuesta" class="block text-sm font-medium text-gray-700">Nueva Calificación (0 - 100)</label>
                            <input type="number" name="calificacion_propuesta" id="calificacion_propuesta" min="0" max="100" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Enviar Valoración a Administración
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Estatus de Solicitudes Enviadas</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">Alumno</th>
                                    <th class="px-4 py-2">Nota Propuesta</th>
                                    <th class="px-4 py-2">Nota Oficial</th>
                                    <th class="px-4 py-2">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($misSolicitudes as $solicitud)
                                    <tr class="border-b">
                                        <td class="px-4 py-2 font-medium text-slate-900">
                                            {{ $solicitud->student->name ?? 'Alumno no encontrado' }}
                                        </td>
                                        <td class="px-4 py-2 font-semibold text-indigo-600">
                                            {{ $solicitud->calificacion_propuesta ?? 'N/A' }}
                                        </td>
                                        <td class="px-4 py-2 text-slate-600">
                                            {{ $solicitud->status === 'aprobado' ? $solicitud->calificacion : 'Sin aprobar' }}
                                        </td>
                                        <td class="px-4 py-2">
                                            @if($solicitud->status === 'pendiente')
                                                <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full font-semibold">Pendiente</span>
                                            @elseif($solicitud->status === 'aprobado')
                                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">Aprobado</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-semibold">Rechazado</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                            No hay solicitudes registradas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>