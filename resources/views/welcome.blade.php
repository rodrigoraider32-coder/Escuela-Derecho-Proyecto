<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aulia | Generador de Horarios UNAM</title>

    <!-- Fuentes Bunny / Inter -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|inter:400,500,600,700,800" rel="stylesheet" />

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes aulia-rise { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes aulia-float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
        @keyframes aulia-shadow { 0%, 100% { transform: scaleX(1); opacity: .25; } 50% { transform: scaleX(.8); opacity: .15; } }
        @keyframes aulia-blink { 0%, 92%, 100% { transform: scaleY(1); } 96% { transform: scaleY(.1); } }
        @keyframes aulia-wave { 0%, 100% { transform: rotate(0deg); } 50% { transform: rotate(-22deg); } }

        .rise { opacity: 0; animation: aulia-rise .7s cubic-bezier(.2,.7,.2,1) forwards; }
        .d1 { animation-delay: .1s; } .d2 { animation-delay: .25s; } .d3 { animation-delay: .4s; } .d4 { animation-delay: .55s; }

        .mascot-body   { animation: aulia-float 4s ease-in-out infinite; }
        .mascot-shadow { transform-origin: 100px 238px; animation: aulia-shadow 4s ease-in-out infinite; }
        .mascot-eyes   { transform-origin: 100px 118px; animation: aulia-blink 5s infinite; }
        .mascot-arm    { transform-origin: 160px 150px; animation: aulia-wave 1.6s ease-in-out infinite; }

        .btn-anim { transition: transform .2s ease, background-color .2s ease; }
        .btn-anim:hover { transform: translateY(-2px); }

        .tech-circuit-bg {
            background-color: #0b132b;
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(29, 63, 209, 0.25) 0%, transparent 60%),
                linear-gradient(rgba(29, 63, 209, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(29, 63, 209, 0.1) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        @media (prefers-reduced-motion: reduce) {
            .rise { opacity: 1; animation: none; }
            .mascot-body, .mascot-shadow, .mascot-eyes, .mascot-arm { animation: none; }
        }
    </style>
</head>
<body class="min-h-screen bg-[#F4F7FC] text-[#0F1F5C] antialiased flex flex-col justify-between" style="font-family: 'Instrument Sans', 'Inter', sans-serif;">

    <!-- HEADER / NAVEGACIÓN -->
    <header class="sticky top-0 z-40 w-full bg-[#0b132b]/95 backdrop-blur-md border-b border-blue-900/40 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div class="flex items-center gap-8">
                <a href="{{ url('/') }}" class="flex items-center gap-2 text-2xl font-black tracking-wider text-white">
                    <span class="rounded-lg bg-[#1D3FD1] px-2.5 py-1 text-white shadow-md">AULIA</span>
                    <span class="text-xs font-semibold tracking-widest text-amber-400 uppercase hidden sm:inline">UNAM</span>
                </a>

                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-300">
                    <a href="#creador" class="hover:text-amber-400 transition">Armar Horario</a>
                    <a href="#profesores" class="hover:text-amber-400 transition">Evaluar Maestros</a>
                </nav>
            </div>

            <!-- RUTAS DE AUTENTICACIÓN DE LARAVEL -->
            @if (Route::has('login'))
                <nav class="flex items-center gap-3 text-sm font-medium">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="btn-anim rounded-lg bg-[#1D3FD1] px-5 py-2.5 text-white shadow-md hover:bg-[#1631A8] font-semibold">
                            Ir al Panel
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="btn-anim rounded-lg px-4 py-2.5 text-slate-200 hover:text-white hover:bg-white/10 font-semibold">
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="btn-anim rounded-lg bg-amber-400 px-5 py-2.5 font-bold text-blue-950 hover:bg-amber-300 shadow-md">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="tech-circuit-bg text-white py-12 lg:py-20 relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 flex flex-col lg:flex-row items-center justify-between gap-12">
            
            <!-- Texto Principal Hero -->
            <div class="flex-1 text-center lg:text-left">
                <span class="rise inline-block rounded-full bg-blue-900/60 px-4 py-1.5 text-xs font-semibold tracking-wide text-amber-300 border border-amber-400/30 mb-4">
                    Plataforma Académica UNAM
                </span>
                <h1 class="rise d1 text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight text-white">
                    Arma tu horario y elige a los <span class="text-amber-400">mejores profesores.</span>
                </h1>
                <p class="rise d2 mt-4 max-w-xl text-base sm:text-lg leading-relaxed text-slate-300">
                    Diseña tu tira de materias en minutos sin empalmes de horario y consulta las evaluaciones y opiniones reales de la comunidad universitaria.
                </p>

                @guest
                    <div class="rise d3 mt-8 flex flex-wrap gap-4 justify-center lg:justify-start">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="btn-anim rounded-xl bg-amber-400 px-8 py-4 text-base font-bold text-blue-950 hover:bg-amber-300 shadow-lg shadow-amber-400/20">
                                Empezar gratis
                            </a>
                        @endif
                        <a href="#creador"
                           class="btn-anim rounded-xl border-2 border-white/30 bg-white/5 px-8 py-4 text-base font-semibold text-white hover:bg-white/10 backdrop-blur-sm">
                            Probar simulador
                        </a>
                    </div>
                @endguest
            </div>

            <!-- Mascota Aulia Animada -->
            <div class="rise d4 w-52 sm:w-64 lg:w-80 shrink-0 flex justify-center" aria-hidden="true">
                <svg viewBox="0 0 200 250" xmlns="http://www.w3.org/2000/svg" class="w-full drop-shadow-2xl">
                    <ellipse class="mascot-shadow" cx="100" cy="238" rx="48" ry="6" fill="#000" opacity="0.4" />

                    <g class="mascot-body">
                        <path d="M78 200 V224 M122 200 V224" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />
                        <ellipse cx="74" cy="226" rx="13" ry="6" fill="#0F1F5C" />
                        <ellipse cx="126" cy="226" rx="13" ry="6" fill="#0F1F5C" />

<<<<<<< HEAD
                <section class="flex-1">
                    <h1 class="rise d1 text-4xl font-bold leading-tight tracking-tight text-[#1D3FD1] sm:text-5xl">
                        Arma tu horario y elige mejor a tus profesores solo aqui.
                    </h1>
                    <p class="rise d2 mt-4 max-w-md text-base leading-relaxed text-[#3A4A8C]">
                        Crea tu horario de clases en minutos y consulta las evaluaciones de otros estudiantes antes de inscribirte.
                    </p>
=======
                        <path d="M40 150 L22 170" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />
                        <path class="mascot-arm" d="M160 150 L180 126" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />
>>>>>>> materias_marquitos

                        <rect x="150" y="36" width="14" height="164" rx="5" fill="#CFE0FF" />
                        <rect x="38" y="28" width="122" height="176" rx="16" fill="#1D3FD1" />

                        <g fill="#9EC1FF">
                            <rect x="28" y="46" width="22" height="9" rx="4.5" />
                            <rect x="28" y="72" width="22" height="9" rx="4.5" />
                            <rect x="28" y="98" width="22" height="9" rx="4.5" />
                            <rect x="28" y="124" width="22" height="9" rx="4.5" />
                            <rect x="28" y="150" width="22" height="9" rx="4.5" />
                            <rect x="28" y="176" width="22" height="9" rx="4.5" />
                        </g>

                        <rect x="66" y="46" width="76" height="28" rx="7" fill="#EAF2FF" />
                        <text x="104" y="65" text-anchor="middle" font-size="16" font-weight="700" fill="#1D3FD1" font-family="Instrument Sans, sans-serif">Aulia</text>

                        <g class="mascot-eyes">
                            <circle cx="84" cy="118" r="10" fill="#fff" />
                            <circle cx="120" cy="118" r="10" fill="#fff" />
                            <circle cx="86" cy="119" r="4.5" fill="#0F1F5C" />
                            <circle cx="122" cy="119" r="4.5" fill="#0F1F5C" />
                        </g>

                        <circle cx="70" cy="140" r="6" fill="#9EC1FF" />
                        <circle cx="134" cy="140" r="6" fill="#9EC1FF" />
                        <path d="M88 142 Q102 156 116 142" stroke="#fff" stroke-width="3.5" fill="none" stroke-linecap="round" />
                    </g>
                </svg>
            </div>

        </div>
    </section>

    <!-- SECCIÓN: ARMAR HORARIO INTERACTIVO -->
    <main id="creador" class="mx-auto max-w-7xl px-6 py-12 lg:px-10 w-full flex-1">
        <div class="mb-8 text-center lg:text-left">
            <h2 class="text-3xl font-black text-[#0b132b]">Generador de Horarios</h2>
            <p class="text-slate-600 mt-1">Selecciona tus asignaturas disponibles para verificar posibles empalmes.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Selección de Materias -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                <h3 class="font-bold text-lg text-blue-900 border-b border-slate-100 pb-3 mb-4">Catalogó de Materias</h3>
                
                <div class="space-y-4">
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 hover:border-blue-300 transition">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bold text-sm text-slate-800">Cálculo Diferencial</span>
                            <span class="text-xs font-semibold px-2 py-0.5 bg-blue-100 text-blue-800 rounded">07:00 - 09:00</span>
                        </div>
                        <p class="text-xs text-slate-500">Prof. Dr. Ricardo Morales (Lun / Mié)</p>
                        <button onclick="toggleSubject('calc')" id="btn-calc" class="mt-3 w-full py-2 bg-[#1D3FD1] text-white text-xs font-bold rounded-lg hover:bg-blue-800 transition">
                            + Agregar a Horario
                        </button>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 hover:border-blue-300 transition">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bold text-sm text-slate-800">Álgebra Lineal</span>
                            <span class="text-xs font-semibold px-2 py-0.5 bg-amber-100 text-amber-800 rounded">09:00 - 11:00</span>
                        </div>
                        <p class="text-xs text-slate-500">Dra. Sofia Hernández (Mar / Jue)</p>
                        <button onclick="toggleSubject('alg')" id="btn-alg" class="mt-3 w-full py-2 bg-[#1D3FD1] text-white text-xs font-bold rounded-lg hover:bg-blue-800 transition">
                            + Agregar a Horario
                        </button>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 hover:border-blue-300 transition">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bold text-sm text-slate-800">Estructura de Datos</span>
                            <span class="text-xs font-semibold px-2 py-0.5 bg-blue-100 text-blue-800 rounded">11:00 - 13:00</span>
                        </div>
                        <p class="text-xs text-slate-500">Mtro. Carlos Mendoza (Lun / Mié)</p>
                        <button onclick="toggleSubject('ed')" id="btn-ed" class="mt-3 w-full py-2 bg-[#1D3FD1] text-white text-xs font-bold rounded-lg hover:bg-blue-800 transition">
                            + Agregar a Horario
                        </button>
                    </div>
                </div>
            </div>

            <!-- Vista Previa de la Tira de Materias -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-center border-b border-slate-100 pb-3 mb-4">
                        <h3 class="font-bold text-lg text-blue-900">Vista Previa del Horario</h3>
                        <span id="subject-count" class="text-xs font-bold text-slate-500">0 materias seleccionadas</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-center text-xs border-collapse">
                            <thead>
                                <tr class="bg-blue-950 text-white font-bold">
                                    <th class="p-2 border border-slate-700">Hora</th>
                                    <th class="p-2 border border-slate-700">Lunes</th>
                                    <th class="p-2 border border-slate-700">Martes</th>
                                    <th class="p-2 border border-slate-700">Miércoles</th>
                                    <th class="p-2 border border-slate-700">Jueves</th>
                                    <th class="p-2 border border-slate-700">Viernes</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <tr>
                                    <td class="p-2 font-semibold bg-slate-100 border">07:00 - 09:00</td>
                                    <td id="slot-lun-7" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                    <td id="slot-mie-7" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                </tr>
                                <tr>
                                    <td class="p-2 font-semibold bg-slate-100 border">09:00 - 11:00</td>
                                    <td class="p-2 border">--</td>
                                    <td id="slot-mar-9" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                    <td id="slot-jue-9" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                </tr>
                                <tr>
                                    <td class="p-2 font-semibold bg-slate-100 border">11:00 - 13:00</td>
                                    <td id="slot-lun-11" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                    <td id="slot-mie-11" class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                    <td class="p-2 border">--</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <button onclick="clearSchedule()" class="px-4 py-2 text-xs font-bold text-slate-500 hover:text-slate-700 transition">
                        Limpiar Horario
                    </button>
                    <button class="px-5 py-2 bg-amber-400 text-blue-950 text-xs font-bold rounded-lg hover:bg-amber-300 transition shadow">
                        Descargar PDF / Comprobante
                    </button>
                </div>
            </div>
        </div>

        <!-- SECCIÓN EVALUACIÓN DE PROFESORES -->
        <div id="profesores" class="mt-16">
            <div class="mb-6">
                <h2 class="text-3xl font-black text-[#0b132b]">Calificación de Maestros</h2>
                <p class="text-slate-600 mt-1">Reseñas comunitarias verificadas sobre metodología de enseñanza y dificultad.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">Facultad de Ingeniería</span>
                        <span class="text-sm font-black text-amber-500">★ 4.9 / 5</span>
                    </div>
                    <h4 class="font-bold text-base text-slate-900">Dr. Ricardo Morales</h4>
                    <p class="text-xs text-slate-500 mb-3">Cálculo y Álgebra</p>
                    <p class="text-xs text-slate-600 italic bg-slate-50 p-3 rounded-lg border border-slate-100">
                        "Explica excelente las derivadas. Sus exámenes son justos y toma en cuenta la asistencia puntual."
                    </p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">Facultad de Ciencias</span>
                        <span class="text-sm font-black text-amber-500">★ 4.7 / 5</span>
                    </div>
                    <h4 class="font-bold text-base text-slate-900">Dra. Sofía Hernández</h4>
                    <p class="text-xs text-slate-500 mb-3">Geometría y Álgebra Lineal</p>
                    <p class="text-xs text-slate-600 italic bg-slate-50 p-3 rounded-lg border border-slate-100">
                        "Muy clara para estructurar las tareas. Da puntos extra por participaciones espontáneas."
                    </p>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">Facultad de Contaduría</span>
                        <span class="text-sm font-black text-amber-500">★ 4.5 / 5</span>
                    </div>
                    <h4 class="font-bold text-base text-slate-900">Mtro. Carlos Mendoza</h4>
                    <p class="text-xs text-slate-500 mb-3">Sistemas y Algoritmos</p>
                    <p class="text-xs text-slate-600 italic bg-slate-50 p-3 rounded-lg border border-slate-100">
                        "Sus proyectos prácticos son extensos pero aprendes demasiado sobre bases de datos."
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#0b132b] text-white py-8 border-t border-blue-900/40 text-center text-xs text-slate-400 mt-12">
        <div class="mx-auto max-w-7xl px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p>&copy; {{ date('Y') }} Aulia UNAM. Todos los derechos reservados.</p>
            <div class="flex gap-4 text-slate-300">
                <a href="#" class="hover:text-amber-400">Privacidad</a>
                <a href="#" class="hover:text-amber-400">Términos</a>
                <a href="#" class="hover:text-amber-400">Soporte</a>
            </div>
        </div>
    </footer>

    <!-- LÓGICA DE INTERACCIÓN INTERNA -->
    <script>
        const selected = { calc: false, alg: false, ed: false };

        function toggleSubject(type) {
            selected[type] = !selected[type];
            const btn = document.getElementById(`btn-${type}`);
            
            if (type === 'calc') {
                const cellLun = document.getElementById('slot-lun-7');
                const cellMie = document.getElementById('slot-mie-7');
                if (selected.calc) {
                    cellLun.innerHTML = '<span class="bg-blue-600 text-white font-semibold p-1 rounded block">Cálculo</span>';
                    cellMie.innerHTML = '<span class="bg-blue-600 text-white font-semibold p-1 rounded block">Cálculo</span>';
                    btn.innerText = '✓ Quitar';
                    btn.classList.replace('bg-[#1D3FD1]', 'bg-rose-600');
                } else {
                    cellLun.innerText = '--';
                    cellMie.innerText = '--';
                    btn.innerText = '+ Agregar a Horario';
                    btn.classList.replace('bg-rose-600', 'bg-[#1D3FD1]');
                }
            } else if (type === 'alg') {
                const cellMar = document.getElementById('slot-mar-9');
                const cellJue = document.getElementById('slot-jue-9');
                if (selected.alg) {
                    cellMar.innerHTML = '<span class="bg-amber-600 text-white font-semibold p-1 rounded block">Álgebra</span>';
                    cellJue.innerHTML = '<span class="bg-amber-600 text-white font-semibold p-1 rounded block">Álgebra</span>';
                    btn.innerText = '✓ Quitar';
                    btn.classList.replace('bg-[#1D3FD1]', 'bg-rose-600');
                } else {
                    cellMar.innerText = '--';
                    cellJue.innerText = '--';
                    btn.innerText = '+ Agregar a Horario';
                    btn.classList.replace('bg-rose-600', 'bg-[#1D3FD1]');
                }
            } else if (type === 'ed') {
                const cellLun = document.getElementById('slot-lun-11');
                const cellMie = document.getElementById('slot-mie-11');
                if (selected.ed) {
                    cellLun.innerHTML = '<span class="bg-indigo-600 text-white font-semibold p-1 rounded block">Est. Datos</span>';
                    cellMie.innerHTML = '<span class="bg-indigo-600 text-white font-semibold p-1 rounded block">Est. Datos</span>';
                    btn.innerText = '✓ Quitar';
                    btn.classList.replace('bg-[#1D3FD1]', 'bg-rose-600');
                } else {
                    cellLun.innerText = '--';
                    cellMie.innerText = '--';
                    btn.innerText = '+ Agregar a Horario';
                    btn.classList.replace('bg-rose-600', 'bg-[#1D3FD1]');
                }
            }

            const count = Object.values(selected).filter(Boolean).length;
            document.getElementById('subject-count').innerText = `${count} materia(s) seleccionada(s)`;
        }

        function clearSchedule() {
            ['calc', 'alg', 'ed'].forEach(type => {
                if (selected[type]) toggleSubject(type);
            });
        }
    </script>
</body>
</html>