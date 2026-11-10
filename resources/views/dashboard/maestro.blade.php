<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0F1F5C] leading-tight">
            {{ __('Panel de Profesores') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#EAF2FF]/30 min-h-screen">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-[#CFE0FF]">
                
                <div class="max-w-[720px] mx-auto p-6">
                        
                    <div class="block mb-6 mx-auto border-b border-[#CFE0FF] pb-4 max-w-[360px] text-center">
                        <h3 class="text-lg font-bold text-[#0F1F5C] mb-1">Gestión de Alumnos</h3>
                        <p class="text-[#3A4A8C] text-xs">Bienvenido Profesor.</p>    
                    </div>

                    <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-sm rounded-2xl border border-[#CFE0FF] bg-clip-border">
                        
                        <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border pb-4 border-b border-[#CFE0FF]">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-[#0F1F5C]">Lista de Alumnos</h3>
                                    <p class="text-[#3A4A8C] text-xs">Revisa los datos de cada persona antes de editar</p>
                                </div>
                                <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                                    <a href="{{route('alumnos.create')}}"
                                    class="flex select-none items-center gap-2 rounded-xl bg-[#1D3FD1] py-2.5 px-4 text-xs font-semibold text-white shadow-sm transition-all hover:bg-[#0F1F5C] focus:opacity-[0.85] active:opacity-[0.85]"
                                    type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                            stroke-width="2" class="w-4 h-4">
                                            <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                            </path>
                                        </svg>
                                        Add Alumno
                                    </a>
                                </div>
                            </div>            
                        </div>

                        <div class="p-0 overflow-x-auto">
                            <table class="w-full mt-2 text-left table-auto min-w-max">
                                <thead>
                                    <tr>
                                        <th class="p-4 border-y border-[#CFE0FF] bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs font-bold uppercase">Member</th>
                                        <th class="p-4 border-y border-[#CFE0FF] bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs font-bold uppercase">Function</th>
                                        <th class="p-4 border-y border-[#CFE0FF] bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs font-bold uppercase">Status</th>
                                        <th class="p-4 border-y border-[#CFE0FF] bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs font-bold uppercase">Employed</th>
                                        <th class="p-4 border-y border-[#CFE0FF] bg-[#EAF2FF]/50 text-[#0F1F5C] text-xs font-bold uppercase">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr class="hover:bg-[#EAF2FF]/20 transition-colors">
                                            <td class="p-4 border-b border-[#CFE0FF]">
                                                <div class="flex items-center gap-3">
                                                    <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg"
                                                    alt="John Michael" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center ring-2 ring-[#EAF2FF]" />
                                                    <div class="flex flex-col">
                                                        <p class="text-sm font-bold text-[#0F1F5C]">{{ $usuario->name }}</p>
                                                        <p class="text-xs text-[#3A4A8C]">{{ $usuario->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-[#CFE0FF]">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-semibold text-[#3A4A8C]">
                                                        {{ucfirst($usuario->role)}}
                                                    </p>                                       
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-[#CFE0FF]">
                                                <div class="w-max">
                                                    <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-[#1D3FD1] uppercase rounded-md select-none whitespace-nowrap bg-[#EAF2FF] border border-[#CFE0FF]">
                                                        <span class="">online</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-[#CFE0FF]">
                                                <p class="text-xs font-medium text-[#3A4A8C]">{{ $usuario->created_at->format('d/m/Y') }}</p>
                                            </td>
                                            <td class="p-4 border-b border-[#CFE0FF]">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{route('alumnos.edit', $usuario->id)}}"
                                                    class="relative h-9 w-9 select-none rounded-lg text-center align-middle text-[#1D3FD1] transition-all hover:bg-[#EAF2FF]"
                                                    type="button" title="Editar">
                                                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <button type="button"
                                                        x-data
                                                        @click="$dispatch('open-delete-modal', { action: '{{ route('alumnos.destroy', $usuario->id) }}' })"
                                                        class="relative h-9 w-9 select-none rounded-lg text-center text-red-600 hover:bg-red-50 transition-colors" title="Eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mx-auto">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 015.869 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.272 0c1.006.05 1.764.92 1.764 1.93v.203a49.123 49.123 0 00-6.8 0v-.203c0-1.01.758-1.88 1.764-1.93zM9.504 8.527a.75.75 0 01.728.773l-.5 8a.75.75 0 11-1.496-.092l.5-8a.75.75 0 01.768-.681zm5.008 0a.75.75 0 01.768.681l.5 8a.75.75 0 01-1.496.092l-.5-8a.75.75 0 01.728-.773z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                        
                        </div>
                        
                        <div class="p-4 border-t border-[#CFE0FF]">
                            {{ $usuarios->links() }}    
                        </div>                            
                    </div>
                </div>

            </div>
                
            <!-- Modal de Eliminación -->
            <div x-data="{ open: false, actionUrl: '' }"
                x-show="open"
                @open-delete-modal.window="open = true; actionUrl = $event.detail.action"
                style="display: none;"
                class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 border border-[#CFE0FF]">
                    <h3 class="text-lg font-bold text-[#0F1F5C] mb-2">Confirmar Eliminación</h3>
                    <p class="text-sm text-[#3A4A8C] mb-6">¿Estás seguro?, Este cambio no se puede deshacer.</p>
                    <div class="flex justify-end gap-3">
                        <button @click="open = false" type="button" class="px-4 py-2 text-xs font-semibold text-[#3A4A8C] bg-[#EAF2FF] rounded-xl hover:bg-[#CFE0FF] transition-colors">
                            Cancelar
                        </button>
                        <form :action="actionUrl" id="deleteAlumnoForm" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="px-4 py-2 text-xs font-semibold text-white bg-red-600 rounded-xl hover:bg-red-700 transition-colors">
                                Sí, Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>