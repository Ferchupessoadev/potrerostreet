@props(['title', 'icon', 'description'])

<div class="group relative bg-slate-900/40 p-8 rounded-lg border border-slate-800 hover:border-ps-cyan transition-all duration-300">
    <div class="absolute inset-0 bg-gradient-to-b from-ps-cyan/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

    <div class="relative z-10">
        <div class="mb-6 p-3 bg-slate-950 inline-block rounded border border-slate-800 text-ps-cyan group-hover:text-white group-hover:bg-ps-cyan transition-colors duration-300">
            <i data-lucide="{{ $icon }}" class="size-6"></i>
        </div>

        <h3 class="text-xl font-bold text-white mb-3 uppercase tracking-wide">
            {{ $title }}
        </h3>

        <p class="text-ps-gray text-sm leading-relaxed">
            {{ $description ?? 'Configuración optimizada para ofrecer la mejor experiencia sin interrupciones.' }}
        </p>
    </div>
</div>
