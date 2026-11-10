<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0F1F5C] leading-tight">
            {{ __('Agregar Alumno') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#EAF2FF]/30 min-h-screen">
        <div class="container mx-auto">
            
            <div class="w-full max-w-md mx-auto bg-white p-8 rounded-2xl shadow-sm border border-[#CFE0FF]">
                <h1 class="text-xl font-bold mb-6 text-center text-[#0F1F5C]">Registro de Nuevo Alumno</h1>
                
                <form action="{{ route('alumnos.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-[#0F1F5C] text-xs font-bold uppercase mb-2" for="name">Nombre</label>
                        <input class="w-full px-3 py-2 border border-[#CFE0FF] rounded-xl text-sm focus:outline-none focus:border-[#1D3FD1] focus:ring-1 focus:ring-[#1D3FD1]"
                        type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="John Doe">
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#0F1F5C] text-xs font-bold uppercase mb-2" for="email">Correo Electrónico</label>
                        <input class="w-full px-3 py-2 border border-[#CFE0FF] rounded-xl text-sm focus:outline-none focus:border-[#1D3FD1] focus:ring-1 focus:ring-[#1D3FD1]"
                        type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="john@example.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-[#0F1F5C] text-xs font-bold uppercase mb-2" for="password">Contraseña</label>
                        <input class="w-full px-3 py-2 border border-[#CFE0FF] rounded-xl text-sm focus:outline-none focus:border-[#1D3FD1] focus:ring-1 focus:ring-[#1D3FD1]"
                        type="password" id="password" name="password" required placeholder="********">
                        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-[#0F1F5C] text-xs font-bold uppercase mb-2" for="confirm-password">Confirmar Contraseña</label>
                        <input class="w-full px-3 py-2 border border-[#CFE0FF] rounded-xl text-sm focus:outline-none focus:border-[#1D3FD1] focus:ring-1 focus:ring-[#1D3FD1]"
                        type="password" id="confirm-password" name="password_confirmation" required placeholder="********">
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-[#CFE0FF]">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-xs font-semibold text-[#3A4A8C] bg-[#EAF2FF] rounded-xl hover:bg-[#CFE0FF] transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 text-xs font-semibold text-white bg-[#1D3FD1] rounded-xl hover:bg-[#0F1F5C] transition-colors">
                            Guardar Alumno
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
</x-app-layout>