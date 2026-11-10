<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aulia</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

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

            .btn { transition: transform .2s ease, background-color .2s ease; }
            .btn:hover { transform: translateY(-2px); }

            @media (prefers-reduced-motion: reduce) {
                .rise { opacity: 1; animation: none; }
                .mascot-body, .mascot-shadow, .mascot-eyes, .mascot-arm { animation: none; }
            }
        </style>
    </head>
    <body class="min-h-screen overflow-x-hidden bg-[#EAF2FF] text-[#0F1F5C] antialiased" style="font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;">

        <div class="mx-auto flex min-h-screen w-full max-w-6xl flex-col px-6 py-6 lg:px-10">

            <header class="rise flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-xl font-bold tracking-tight text-[#1D3FD1]">Aulia</a>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-3 text-sm font-medium">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="btn rounded-lg bg-[#1D3FD1] px-5 py-2 text-white hover:bg-[#1631A8]">
                                Panel
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="btn rounded-lg px-5 py-2 text-[#1D3FD1] hover:bg-[#CFE0FF]">
                                Iniciar sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="btn rounded-lg bg-[#1D3FD1] px-5 py-2 text-white hover:bg-[#1631A8]">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="flex flex-1 flex-col items-center justify-center gap-8 py-10 lg:flex-row lg:gap-20">

                <section class="flex-1">
                    <h1 class="rise d1 text-4xl font-bold leading-tight tracking-tight text-[#1D3FD1] sm:text-5xl">
                        Arma tu horario y elige mejor a tus profesores solo aqui.
                    </h1>
                    <p class="rise d2 mt-4 max-w-md text-base leading-relaxed text-[#3A4A8C]">
                        Crea tu horario de clases en minutos y consulta las evaluaciones de otros estudiantes antes de inscribirte.
                    </p>

                    @guest
                        <div class="rise d3 mt-8 flex flex-wrap gap-3">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                   class="btn rounded-lg bg-[#1D3FD1] px-6 py-3 text-sm font-semibold text-white hover:bg-[#1631A8]">
                                    Iniciar sesión.
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="btn rounded-lg border-2 border-[#1D3FD1] px-6 py-3 text-sm font-semibold text-[#1D3FD1] hover:bg-[#CFE0FF]">
                                    Registrarse
                                </a>
                            @endif
                        </div>
                    @endguest
                </section>

                {{-- Mascota: la libreta de Aulia --}}
                <section class="rise d4 w-44 shrink-0 sm:w-52 lg:w-64" aria-hidden="true">
                    <svg viewBox="0 0 200 250" xmlns="http://www.w3.org/2000/svg" class="w-full">
                        <ellipse class="mascot-shadow" cx="100" cy="238" rx="48" ry="6" fill="#1D3FD1" />

                        <g class="mascot-body">
                            <path d="M78 200 V224 M122 200 V224" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />
                            <ellipse cx="74" cy="226" rx="13" ry="6" fill="#0F1F5C" />
                            <ellipse cx="126" cy="226" rx="13" ry="6" fill="#0F1F5C" />

                            <path d="M40 150 L22 170" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />
                            <path class="mascot-arm" d="M160 150 L180 126" stroke="#1D3FD1" stroke-width="8" stroke-linecap="round" />

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
                </section>
            </main>
        </div>

    </body>
</html>