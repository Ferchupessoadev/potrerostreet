<x-layouts.app>
    <x-welcome.hero />

    <section class="max-w-7xl mx-auto py-24 px-6" x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)">
        <h2 class="text-white text-4xl font-black uppercase mb-16 tracking-tighter">
            ¿Por qué <span class="text-ps-cyan">Potrero?</span>
        </h2>

        <div class="grid md:grid-cols-3 gap-8 transition-all duration-1000 transform"
             :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">

            <x-welcome.card-ventaja title="Anti-Cheat" icon="shield-check">
                Jugadores limpios, combates justos. La ley la imponemos nosotros.
            </x-welcome.card-ventaja>

            <x-welcome.card-ventaja title="Sin Lag" icon="zap">
                Infraestructura optimizada para que cada milisegundo cuente en tu jugada.
            </x-welcome.card-ventaja>

            <x-welcome.card-ventaja title="Comunidad" icon="users">
                Miles de jugadores ya eligieron su lugar en la calle.
            </x-welcome.card-ventaja>
        </div>
    </section>
</x-layouts.app>
