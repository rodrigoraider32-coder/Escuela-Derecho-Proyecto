<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Revisión de Calificaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('info'))
                <div class="p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-lg">
                    {{ session('info') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">
                @if($calificacionesPendientes->isNotEmpty())
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Alumno</th>
                                <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Carrera</th>
                                <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Materia</th>
                                <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Nota Propuesta</th>
                                <th class="p-4 text-xs font-semibold text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($calificacionesPendientes as $cal)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 font-medium text-gray-900">
                                        {{ $cal->student->name ?? 'Sin nombre' }}
                                    </td>
                                    <td class="p-4 text-gray-600">
                                        {{ $cal->student->carrera->nombre ?? 'Sin carrera' }}
                                    </td>
                                    <td class="p-4 text-gray-600">
                                        {{ $cal->materia->nombre ?? 'N/A' }}
                                    </td>
                                    <td class="p-4 font-bold text-amber-600">
                                        {{ $cal->calificacion_propuesta }}
                                    </td>
                                    <td class="p-4 flex space-x-2">
                                        <form action="{{ route('admin.calificaciones.aprobar', $cal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded text-xs font-semibold">
                                                Aprobar
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.calificaciones.rechazar', $cal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs font-semibold">
                                                Rechazar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-6 text-center text-gray-500">
                        No hay solicitudes de calificaciones pendientes por revisar.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>