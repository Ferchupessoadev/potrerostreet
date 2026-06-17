<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' | Potrero Street' : 'Potrero Street' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <aside class="w-64 bg-slate-800 text-white p-5">
            <h1 class="text-2xl font-bold mb-10">Potrero Street</h1>
            <nav>
                <a href="/dashboard" class="block py-2.5 px-4 hover:bg-slate-700 rounded">Inicio</a>
                <a href="#" class="block py-2.5 px-4 hover:bg-slate-700 rounded">Mis Servicios</a>
                <a href="#" class="block py-2.5 px-4 hover:bg-slate-700 rounded">Configuración</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow p-4 flex justify-end items-center">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.Auth::user()->name }}"
                             alt="Avatar" class="w-10 h-10 rounded-full border">
                        <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 text-sm">Cerrar sesión</button>
                    </form>
                </div>
            </header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
