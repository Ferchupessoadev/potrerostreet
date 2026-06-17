<header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-ps-cyan/20 bg-black/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img class="w-10 h-10 object-contain" src="{{ asset('logo-default.png') }}" alt="Potrero Street">
            <span class="text-xl font-bold tracking-tight">
                <span class="text-ps-cyan">Potrero</span> <span class="text-white">Street</span>
            </span>
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium uppercase tracking-widest text-white">
            <a href="/" class="hover:text-ps-cyan transition-colors border-b-2 {{ request()->is('/') ? 'text-ps-cyan border-ps-cyan' : 'border-transparent' }}">Inicio</a>
            <a href="#" class="hover:text-ps-cyan transition-colors border-b-2 border-transparent">Tienda</a>
            <a href="#" class="hover:text-ps-cyan transition-colors border-b-2 border-transparent">Contacto</a>

            @auth
                <div class="flex items-center gap-6 border-l border-white/10 pl-6">
                    <span class="text-ps-gray text-xs truncate max-w-[100px]">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-ps-gray hover:text-white transition-colors">Salir</button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-8 border-l border-white/10 pl-8">
                    <a href="{{ route('auth.login') }}" class="hover:text-ps-cyan transition-colors">Login</a>
                    <a href="{{ route('auth.register') }}" class="px-6 py-2 bg-ps-cyan text-black font-black rounded hover:bg-white transition-all duration-300">Registro</a>
                </div>
            @endauth
        </nav>

        <!-- Mobile Menu Toggle -->
        <button @click="open = !open" class="md:hidden text-white p-2">
            <i data-lucide="menu" class="size-6"></i>
        </button>
    </div>

    <!-- Mobile Nav -->
    <nav x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-slate-950 border-b border-slate-900 p-6 flex flex-col gap-4 text-white">
        <a href="/" class="hover:text-ps-cyan">Inicio</a>
        <a href="#" class="hover:text-ps-cyan">Tienda</a>
        <a href="#" class="hover:text-ps-cyan">Contacto</a>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-400">Salir</button>
            </form>
        @else
            <a href="{{ route('auth.login') }}" class="text-ps-cyan">Login</a>
            <a href="{{ route('auth.register') }}">Registro</a>
        @endauth
    </nav>
</header>
