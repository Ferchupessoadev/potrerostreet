<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-ps-black">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($title) ? $title . ' | Potrero Street' : 'Potrero Street' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-sans text-white antialiased">
        <x-header />
        <main class="min-h-screen">
            {{ $slot }}
        </main>
        <x-footer />
    </body>
</html>
