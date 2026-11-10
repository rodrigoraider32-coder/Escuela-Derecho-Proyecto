<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <!-- Encabezado de la tabla y botón de agregar -->
                <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
                    <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-800">Lista de Empleados</h3>
                                <p class="text-slate-500 text-sm">Revisa la información de cada usuario antes de editar</p>
                            </div>
                            <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                                <a href="#"
                                   class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] active:opacity-[0.85]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" stroke-width="2" class="w-4 h-4">
                                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                    </svg>
                                    Add member
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de datos -->
                    <div class="p-0 overflow-x-auto">
                        <table class="w-full mt-4 text-left table-auto min-w-max">
                            <thead>
                                <tr>
                                    <th class="p-4 border-y border-slate-200 bg-slate-50 text-slate-500 text-sm font-normal">Member</th>
                                    <th class="p-4 border-y border-slate-200 bg-slate-50 text-slate-500 text-sm font-normal">Function</th>
                                    <th class="p-4 border-y border-slate-200 bg-slate-50 text-slate-500 text-sm font-normal">Status</th>
                                    <th class="p-4 border-y border-slate-200 bg-slate-50 text-slate-500 text-sm font-normal">Employed</th>
                                    <th class="p-4 border-y border-slate-200 bg-slate-50 text-slate-500 text-sm font-normal text-center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <!-- Nombre y Correo -->
                                        <td class="p-4 border-b border-slate-200">
                                            <div class="flex items-center gap-3">
                                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg"
                                                    alt="Avatar" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                                <div class="flex flex-col">
                                                    <p class="text-sm font-semibold text-slate-700">{{ $usuario->name }}</p>
                                                    <p class="text-sm text-slate-500">{{ $usuario->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Función / Rol -->
                                        <td class="p-4 border-b border-slate-200">
                                            <div class="flex flex-col">
                                                <p class="text-sm font-semibold text-slate-700">Manager</p>
                                                <p class="text-sm text-slate-500">Organization</p>
                                            </div>
                                        </td>

                                        <!-- Estatus -->
                                        <td class="p-4 border-b border-slate-200">
                                            <div class="w-max">
                                                <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                    <span>online</span>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Fecha de registro -->
                                        <td class="p-4 border-b border-slate-200">
                                            <p class="text-sm text-slate-500">{{ $usuario->created_at->format('d/m/Y') }}</p>
                                        </td>

                                        <!-- Botón Editar -->
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <a href="#" class="relative inline-flex items-center justify-center h-10 w-10 rounded-lg text-slate-900 transition-all hover:bg-slate-900/10 active:bg-slate-900/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                                </svg>
                                            </a>
                                        </td>

                                        <!-- Botón Eliminar -->
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="relative inline-flex items-center justify-center h-10 w-10 rounded-lg text-slate-900 transition-all hover:bg-slate-900/10 active:bg-slate-900/20">
                                                    <img src="{{ asset('img/trash-v2.png.jpg') }}" class="w-5 h-5 object-contain" alt="Eliminar">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación inferior -->
                    <div class="flex items-center justify-between p-3 border-t border-slate-200 mt-4">
                        <p class="block text-sm text-slate-500">
                            Page 1 of 10
                        </p>
                        <div class="flex gap-1">
                            <button class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75">
                                Previous
                            </button>
                            <button class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75">
                                Next
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>