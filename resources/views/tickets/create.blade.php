<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Ticket de Soporte') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow-sm">
            <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-center mb-6">Nuevo Ticket</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="type" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Dirigido a</label>
                    <select name="type" id="type" onchange="toggleMaestroSelect()" class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <option value="alumno_admin" {{ old('type') == 'alumno_admin' ? 'selected' : '' }}>Administración</option>
                        <option value="alumno_maestro" {{ old('type') == 'alumno_maestro' ? 'selected' : '' }}>Profesor</option>
                    </select>
                </div>

                <div class="mb-4 {{ old('type') == 'alumno_maestro' ? '' : 'hidden' }}" id="maestro_container">
                    <label for="maestro_id" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Selecciona el Profesor</label>
                    <select name="maestro_id" id="maestro_id" class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <option value="">-- Selecciona un profesor --</option>
                        @foreach($maestros as $maestro)
                            <option value="{{ $maestro->id }}" {{ old('maestro_id') == $maestro->id ? 'selected' : '' }}>
                                {{ $maestro->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="titulo" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Título / Asunto</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required placeholder="Asunto del ticket" class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Descripción del problema</label>
                    <textarea rows="4" name="descripcion" id="descripcion" required placeholder="Escribe aquí los detalles..." class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('descripcion') }}</textarea>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Enviar Ticket
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleMaestroSelect() {
            const type = document.getElementById('type').value;
            const maestroContainer = document.getElementById('maestro_container');
            if (type === 'alumno_maestro') {
                maestroContainer.classList.remove('hidden');
            } else {
                maestroContainer.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>

