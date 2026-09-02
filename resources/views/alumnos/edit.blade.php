<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Alumno') }}
        </h2>
    </x-slot>

        <script src="https://cdn.tailwindcss.com"></script>
            <body class="bg-gray-100">
                <div class="container mx-auto py-8">
                    <h1 class="text-2xl font-bold mb-6 text-center">Edit Alumno</h1>
                    <form action="{{ route('alumnos.update', $usuario->id) }}" method="POST" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}" required placeholder="John Doe">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="email" id="email" name="email" value="{{ old('email', $usuario->email) }}" required placeholder="john@example.com">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Nueva Contraseña (Opcional)</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="password" id="password" name="password" placeholder="Dejar en blanco para mantener la actual">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex items-center justify-end gap-2 pt-4">
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">Cancelar</a>
                            <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded-md hover:bg-slate-700">Actualizar Alumno</button>
                        </div>
                    </form>
                </div>
    </body>
</x-app-layout>