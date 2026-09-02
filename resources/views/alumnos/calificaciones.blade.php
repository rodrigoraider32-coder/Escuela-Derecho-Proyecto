<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis Calificaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                <span class="text-gray-500 text-sm font-medium uppercase">Promedio General</span>
                <div class="text-3xl font-bold text-gray-800 mt-1">
                    {{ number_format(Auth::user()->promedio ?? 0, 2) }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100 text-gray-700 text-xs uppercase font-semibold">
                        <tr>
                            <th class="p-4">Materia</th>
                            <th class="p-4">Periodo</th>
                            <th class="p-4">Tipo</th>
                            <th class="p-4">Profesor</th>
                            <th class="p-4 text-center">Calificación</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse($calificaciones as $materiaId => $listaNotas)
                            @foreach($listaNotas as $nota)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 font-medium text-gray-900">
                                        {{ $nota->materia->nombre ?? 'N/A' }}
                                    </td>
                                    <td class="p-4 text-gray-600">{{ $nota->periodo }}</td>
                                    <td class="p-4 text-gray-600">{{ $nota->exam_tipo }}</td>
                                    <td class="p-4 text-gray-600">{{ $nota->teacher->name ?? 'N/A' }}</td>
                                    <td class="p-4 text-center font-bold {{ $nota->calificacion >= 60 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ number_format($nota->calificacion, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="5" class="p-6 text-center text-gray-500">
                                    Aún no tienes calificaciones registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>