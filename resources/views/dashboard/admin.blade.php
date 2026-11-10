<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#0F1F5C] leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="max-w-[720px] mx-auto py-6" x-data="{ tab: 'alumnos', openDelete: false, actionUrl: '', deleteItemName: '' }">
         
        <!-- Vista General del Sistema -->
        <div class="block mb-6 mx-auto border-b border-[#CFE0FF] pb-4 max-w-[400px] text-center">
            <h3 class="block w-full px-4 py-1 text-slate-800 font-bold text-lg">
                Vista General del Sistema
            </h3>
            <p class="text-[#3A4A8C] text-sm mt-1">Gestiona la información global de alumnos y profesores.</p>
        </div>

        <!-- Pestañas de Navegación -->
        <div class="flex bg-[#CFE0FF]/40 p-1 rounded-xl mb-6">
            <button 
                @click="tab = 'alumnos'" 
                :class="{ 'bg-[#1D3FD1] text-white shadow-sm': tab === 'alumnos', 'text-[#3A4A8C] hover:text-[#0F1F5C]': tab !== 'alumnos' }"
                class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg transition-all">
                Alumnos ({{ count($alumnos) }})
            </button>
            <button 
                @click="tab = 'maestros'" 
                :class="{ 'bg-[#1D3FD1] text-white shadow-sm': tab === 'maestros', 'text-[#3A4A8C] hover:text-[#0F1F5C]': tab !== 'maestros' }"
                class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg transition-all">
                Maestros ({{ count($maestros) }})
            </button>
        </div>

        <!-- TAB ALUMNOS -->
        <div x-show="tab === 'alumnos'" x-cloak class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border border border-[#CFE0FF]/50">
            <div class="relative mx-6 mt-6 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-[#0F1F5C]">Directorio de Alumnos</h3>
                        <p class="text-[#3A4A8C] text-sm">Lista general de estudiantes registrados</p>
                    </div>
                    <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                        <a href="{{ route('alumnos.create') }}"
                           class="flex select-none items-center gap-2 rounded-lg bg-[#1D3FD1] py-2.5 px-4 text-xs font-semibold text-white shadow-md transition-all hover:bg-[#1631A8]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"/>
                            </svg>
                            Agregar Alumno
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-0 overflow-x-auto mt-4">
                <table class="w-full text-left table-auto min-w-max">
                    <thead class="bg-[#EAF2FF] border-b border-[#CFE0FF] text-xs text-[#0F1F5C] uppercase">
                        <tr>
                            <th class="p-4">Alumno</th>
                            <th class="p-4">Rol</th>
                            <th class="p-4">Registro</th>
                            <th class="p-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($alumnos as $alumno)
                            <tr class="hover:bg-[#EAF2FF]/50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#CFE0FF] text-[#1D3FD1] font-bold flex items-center justify-center text-sm">
                                            {{ strtoupper(substr($alumno->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-[#0F1F5C]">{{ $alumno->name }}</p>
                                            <p class="text-xs text-[#3A4A8C]">{{ $alumno->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-[#EAF2FF] text-[#1D3FD1]">
                                        {{ ucfirst($alumno->role ?? 'Alumno') }}
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-[#3A4A8C]">
                                    {{ $alumno->created_at ? $alumno->created_at->format('d/m/Y') : 'N/A' }}
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="p-2 text-[#3A4A8C] hover:text-[#1D3FD1] hover:bg-[#EAF2FF] rounded-lg transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <button type="button" 
                                            @click="openDelete = true; actionUrl = '{{ route('alumnos.destroy', $alumno->id) }}'; deleteItemName = '{{ $alumno->name }}'"
                                            class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-6 text-center text-[#3A4A8C] text-sm">No hay alumnos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- TAB MAESTROS -->
        <div x-show="tab === 'maestros'" x-cloak class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border border border-[#CFE0FF]/50">
            <div class="relative mx-6 mt-6 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-[#0F1F5C]">Directorio de Profesores</h3>
                        <p class="text-[#3A4A8C] text-sm">Lista general de Maestros registrados</p>
                    </div>
                    <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                        <!-- Ajusta esta ruta si tienes una específica para crear maestros, ej: route('maestros.create') -->
                        <a href="#"
                        class="flex select-none items-center gap-2 rounded-lg bg-[#1D3FD1] py-2.5 px-4 text-xs font-semibold text-white shadow-md transition-all hover:bg-[#1631A8]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"/>
                            </svg>
                            Agregar Profesor
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-0 overflow-x-auto mt-4">
                <table class="w-full text-left table-auto min-w-max">
                    <thead class="bg-[#EAF2FF] border-b border-[#CFE0FF] text-xs text-[#0F1F5C] uppercase">
                        <tr>
                            <th class="p-4">Profesor</th>
                            <th class="p-4">Rol</th>
                            <th class="p-4">Registro</th>
                            <th class="p-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($maestros as $maestro)
                            <tr class="hover:bg-[#EAF2FF]/50 transition-colors">
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#CFE0FF] text-[#1D3FD1] font-bold flex items-center justify-center text-sm">
                                            {{ strtoupper(substr($maestro->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-[#0F1F5C]">{{ $maestro->name }}</p>
                                            <p class="text-xs text-[#3A4A8C]">{{ $maestro->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-[#EAF2FF] text-[#1D3FD1]">
                                        {{ ucfirst($maestro->role ?? 'maestro') }}
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-[#3A4A8C]">
                                    {{ $maestro->created_at ? $maestro->created_at->format('d/m/Y') : 'N/A' }}
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="#" class="p-2 text-[#3A4A8C] hover:text-[#1D3FD1] hover:bg-[#EAF2FF] rounded-lg transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <button type="button" 
                                            @click="openDelete = true; actionUrl = '{{ route('alumnos.destroy', $maestro->id) }}'; deleteItemName = '{{ $maestro->name }}'"
                                            class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-6 text-center text-[#3A4A8C] text-sm">No hay profesores registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL DE ELIMINACIÓN -->
        <div x-show="openDelete" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 border border-[#CFE0FF]">
                <h3 class="text-lg font-bold text-[#0F1F5C] mb-2">Confirmar Eliminación</h3>
                <p class="text-sm text-[#3A4A8C] mb-6">
                    ¿Estás seguro de que deseas eliminar a <span class="font-bold text-[#0F1F5C]" x-text="deleteItemName"></span>? Esta acción no se puede deshacer.
                </p>
                <div class="flex justify-end gap-3">
                    <button @click="openDelete = false" type="button" class="px-4 py-2 text-sm text-[#3A4A8C] bg-[#EAF2FF] rounded-lg hover:bg-[#CFE0FF] transition-all">
                        Cancelar
                    </button>
                    <form :action="actionUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 transition-all">
                            Sí, Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>