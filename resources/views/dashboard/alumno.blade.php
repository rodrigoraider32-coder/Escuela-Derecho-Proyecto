<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0F1F5C] leading-tight">
            {{ __('Panel del Alumno') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#EAF2FF]/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                <!-- Columna Izquierda: Perfil del Alumno -->
                <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm p-6 border border-[#CFE0FF] flex flex-col justify-between h-full">
                    <div>
                        <div class="flex flex-col items-center text-center pb-6 border-b border-[#CFE0FF]">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full object-cover mb-3 ring-4 ring-[#EAF2FF]">
                            <h3 class="font-bold text-[#0F1F5C] text-lg">{{ Auth::user()->name }}</h3>
                            <span class="mt-1 bg-[#EAF2FF] text-[#1D3FD1] text-xs font-semibold px-2.5 py-0.5 rounded-full border border-[#CFE0FF]">
                                Alumno Activo
                            </span>
                        </div>

                        <div class="mt-6 space-y-4 text-sm">
                            <div>
                                <p class="text-xs uppercase font-bold text-[#3A4A8C]">Correo</p>
                                <p class="font-medium text-[#0F1F5C] truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase font-bold text-[#3A4A8C]">Carrera</p>
                                <p class="font-medium text-[#0F1F5C]">{{ Auth::user()->carrera ?? 'Lic. en Informática' }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase font-bold text-[#3A4A8C]">Matrícula</p>
                                <p class="font-medium text-[#0F1F5C]">2026-INF-01</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase font-bold text-[#3A4A8C]">Semestre</p>
                                <p class="font-medium text-[#0F1F5C]">1er Semestre</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-4 border-t border-[#CFE0FF]">
                        <a href="{{ route('profile.show') }}" class="block w-full text-center text-xs font-semibold text-[#1D3FD1] hover:text-[#0F1F5C] transition-colors">
                            Editar Perfil →
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Tarjetas de Acceso -->
                <div class="lg:col-span-3 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <!-- Tarjeta Calificaciones -->
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-[#CFE0FF] flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <div class="w-10 h-10 rounded-lg bg-[#EAF2FF] text-[#1D3FD1] flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                </div>
                                <h4 class="font-bold text-[#0F1F5C] text-base">Calificaciones</h4>
                                <p class="text-[#3A4A8C] text-xs mt-1">Consulta tus notas y avance de parciales.</p>
                            </div>
                            <a href="{{ route('alumno.calificaciones') }}" class="mt-4 text-center bg-[#EAF2FF] text-[#1D3FD1] hover:bg-[#1D3FD1] hover:text-white font-semibold py-2 rounded-xl text-xs transition-colors">
                                Ver Notas
                            </a>
                        </div>

                        <!-- Tarjeta Materias -->
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-[#CFE0FF] flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <div class="w-10 h-10 rounded-lg bg-[#EAF2FF] text-[#1D3FD1] flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                                <div class="flex items-center justify-between">
                                    <h4 class="font-bold text-[#0F1F5C] text-base">Materias</h4>
                                    <span class="text-[10px] bg-[#EAF2FF] text-[#1D3FD1] font-semibold px-2 py-0.5 rounded border border-[#CFE0FF]">Activo</span>
                                </div>
                                <p class="text-[#3A4A8C] text-xs mt-1">Alta y registro de materias escolares.</p>
                            </div>
                            <a href="{{ route('materias.index') }}" class="mt-4 text-center bg-[#EAF2FF] text-[#1D3FD1] hover:bg-[#1D3FD1] hover:text-white font-semibold py-2 rounded-xl text-xs transition-colors">
                                Ver Materias
                            </a>
                        </div>

                        <!-- Tarjeta Tickets -->
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-[#CFE0FF] flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <div class="w-10 h-10 rounded-lg bg-[#EAF2FF] text-[#1D3FD1] flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                </div>
                                <h4 class="font-bold text-[#0F1F5C] text-base">Tickets</h4>
                                <p class="text-[#3A4A8C] text-xs mt-1">Envía dudas o reportes a profesores y admin.</p>
                            </div>
                            <a href="{{ route('tickets.create') }}" class="mt-4 text-center bg-[#1D3FD1] hover:bg-[#0F1F5C] text-white font-semibold py-2 rounded-xl text-xs transition-colors">
                                Crear Ticket
                            </a>
                        </div>

                    </div>

                    <!-- Sección de Método de Pago e Información Financiera -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-[#CFE0FF]">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between border-b border-[#CFE0FF] pb-4 mb-4 gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-[#EAF2FF] text-[#1D3FD1] flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#0F1F5C] text-base">Método de Pago</h4>
                                    <p class="text-[#3A4A8C] text-xs">Administra tus pagos colegiales, inscripciones y referencias</p>
                                </div>
                            </div>
                            <a href="{{ route('pagos.index') }}" 
                               class="bg-[#1D3FD1] hover:bg-[#0F1F5C] text-white font-semibold px-4 py-2 rounded-xl text-xs transition-colors inline-block">
                                Realizar Pago
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs bg-[#EAF2FF]/50 p-4 rounded-xl border border-[#CFE0FF]">
                            <div>
                                <span class="text-[#3A4A8C] block">Estatus de Colegiatura</span>
                                <span class="font-bold text-[#1D3FD1]">Al Corriente</span>
                            </div>
                            <div>
                                <span class="text-[#3A4A8C] block">Próximo Vencimiento</span>
                                <span class="font-bold text-[#0F1F5C]">10 / Octubre / 2026</span>
                            </div>
                            <div>
                                <span class="text-[#3A4A8C] block">Monto Anual</span>
                                <span class="font-bold text-[#0F1F5C]">$0.20 MXN</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>