<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0F1F5C] leading-tight">
            Mis Calificaciones
        </h2>
    </x-slot>

    <div class="py-12 bg-[#EAF2FF]/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tarjeta Promedio General -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#CFE0FF] border-l-4 border-l-[#1D3FD1]">
                <span class="text-[#3A4A8C] text-xs font-bold uppercase">Promedio General</span>
                <div class="text-3xl font-bold text-[#0F1F5C] mt-1">
                    {{ number_format(Auth::user()->promedio ?? 0, 2) }}
                </div>
            </div>

            <!-- Tabla de Calificaciones -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-[#CFE0FF]">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-max">
                        <thead class="bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs uppercase font-bold border-b border-[#CFE0FF]">
                            <tr>
                                <th class="p-4">Materia</th>
                                <th class="p-4">Periodo</th>
                                <th class="p-4">Tipo</th>
                                <th class="p-4">Profesor</th>
                                <th class="p-4 text-center">Calificación</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#CFE0FF] text-sm">
                            @forelse($calificaciones as $materiaId => $listaNotas)
                                @foreach($listaNotas as $nota)
                                    <tr class="hover:bg-[#EAF2FF]/20 transition-colors">
                                        <td class="p-4 font-bold text-[#0F1F5C]">
                                            {{ $nota->materia->nombre ?? 'N/A' }}
                                        </td>
                                        <td class="p-4 text-[#3A4A8C]">{{ $nota->periodo }}</td>
                                        <td class="p-4 text-[#3A4A8C]">{{ $nota->exam_tipo }}</td>
                                        <td class="p-4 text-[#3A4A8C]">{{ $nota->teacher->name ?? 'N/A' }}</td>
                                        <td class="p-4 text-center font-bold {{ $nota->calificacion >= 60 ? 'text-[#1D3FD1]' : 'text-red-600' }}">
                                            {{ number_format($nota->calificacion, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-[#3A4A8C]">
                                        Aún no tienes calificaciones registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>