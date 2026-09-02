<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="max-w-[720px] mx-auto">
                        
                        <div class="block mb-4 mx-auto border-b border-slate-300 pb-2 max-w-[360px]">
                            <a class='block w-full px-4 py-2 text-center text-slate-700 transition-all '>
                                <h3 class="text-lg font-medium text-slate-900 mb-4">Gestión de Alumnos</h3>
                                <p class="text-slate-600">Bienvenido Profesor.</p>    
                            </a>
                        </div>

                        <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
                            
                            <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                                <div class="flex items-center justify-between ">
                                    <div>
                                        <h3 class="text-lg font-semibold text-slate-800">Lista de Alumnos</h3>
                                        <p class="text-slate-500">Review each person before edit</p>
                                    </div>
                                    <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                                        <a href="{{route('alumnos.create')}}"
                                        class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
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
                            <div class="p-0 overflow-scroll">
                                <table class="w-full mt-4 text-left table-auto min-w-max">
                                <thead>
                                    <tr>
                                        <th
                                            class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                            <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                                            Member
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                            </svg>
                                            </p>
                                        </th>
                                        <th
                                            class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                            <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
                                            Function
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                            </svg>
                                            </p>
                                        </th>
                                        <th
                                            class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                            <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            Status
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                            </svg>
                                            </p>
                                        </th>
                                        <th
                                            class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                            <p
                                            class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                            Employed
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                            </svg>
                                            </p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="p-4 border-b border-slate-200">
                                                <div class="flex items-center gap-3">
                                                    <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg"
                                                    alt="John Michael" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                                    <div class="flex flex-col">
                                                        <p class="text-sm font-semibold text-slate-700">{{ $usuario->name }}</p>
                                                        <p class="text-sm text-slate-500">{{ $usuario->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-slate-200">
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-semibold text-slate-700">
                                                        {{ucfirst($usuario->role)}}
                                                    </p>                                            
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-slate-200">
                                                <div class="w-max">
                                                    <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold 
                                                    text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                        <span class="">online</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 border-b border-slate-200">
                                                <p class="text-sm text-slate-500">{{ $usuario->created_at->format('d/m/Y') }}</p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200">
                                                <div class="flex items-center gap-2">
                                                    <a href="{{route('alumnos.edit', $usuario->id)}}"
                                                    class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-slate-900 transition-all hover:bg-slate-900/10 active:bg-slate-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                    type="button">
                                                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                                            class="w-4 h-4">
                                                                <path
                                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                        <button type="button"
                                                            x-data
                                                            @click="$dispatch('open-delete-modal', { action: '{{ route('alumnos.destroy', $usuario->id) }}' })"
                                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center text-red-600 hover:bg-red-500/10">
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
                            <div class="p-4 border-t border-slate-200">
                                {{ $usuarios->links() }}    
                            </div>                            
                        </div>
                </div>

            </div>
                    <div x-data="{ open: false, actionUrl: '' }"
                        x-show="open"
                        @open-delete-modal.window="open = true; actionUrl = $event.detail.action"
                        style="display: none;"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Confirmar Eliminación</h3>
                            <p class="text-sm text-gray-600 mb-6">¿Estás seguro?, Este cambio no se puede deshacer</p>
                            <div class="flex justify-end gap-3">
                                <button @click="open = false" type="button" class="px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                                    Cancelar
                                </button>
                                <form :action="actionUrl" id="deleteAlumnoForm" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700">
                                        Sí, Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    
</x-app-layout>