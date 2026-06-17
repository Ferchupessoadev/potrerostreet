<x-layouts.app title="Login">
    <div class="flex flex-col items-center justify-center min-h-[70vh] px-6">

        <div class="w-full max-w-sm">
            <form action="/login" method="POST" class="p-8 bg-black border border-ps-gray/30 shadow-[0_0_30px_rgba(0,0,0,0.5)]">
                @csrf
                <h2 class="font-display text-4xl mb-8 text-white uppercase tracking-tighter">
                    Acceso <span class="text-ps-cyan">Potrero</span>
                </h2>

                <div class="space-y-4">
                    <input type="email" name="email" placeholder="Email" required
                           class="w-full p-3 bg-black border border-ps-gray text-white focus:border-ps-cyan focus:outline-none transition-colors">

                    <input type="password" name="password" placeholder="Password" required
                           class="w-full p-3 bg-black border border-ps-gray text-white focus:border-ps-cyan focus:outline-none transition-colors">
                </div>

                <button type="submit" class="w-full mt-6 bg-ps-cyan text-black font-black uppercase py-3 hover:bg-white transition-all duration-300">
                    Entrar
                </button>
            </form>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-ps-gray/30"></div></div>
                <div class="relative flex justify-center text-xs uppercase text-ps-gray"><span class="bg-black px-2">o continuar con</span></div>
            </div>

            <div class="grid gap-3">
                <a href="{{ route('auth.redirect', 'discord') }}"
                   class="flex items-center justify-center gap-2 rounded-md py-3 bg-[#5865F2] hover:bg-[#4752F2] transition-all duration-300 text-white font-bold uppercase text-sm tracking-widest shadow-lg">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.103 18.055a.07.07 0 0 0 .026.046 19.89 19.89 0 0 0 5.982 3.075.074.074 0 0 0 .079-.036 14.634 14.634 0 0 0 1.263-2.062.075.075 0 0 0-.041-.103 12.78 12.78 0 0 1-1.847-.887.075.075 0 0 1-.007-.124c.125-.094.25-.192.373-.29a.074.074 0 0 1 .077-.005 13.91 13.91 0 0 0 11.666 0 .074.074 0 0 1 .077.005c.123.098.248.196.374.29a.075.075 0 0 1-.006.124 12.924 12.924 0 0 1-1.848.887.075.075 0 0 0-.04.103c.394.675.823 1.327 1.263 2.062a.074.074 0 0 0 .079.036 19.89 19.89 0 0 0 5.982-3.075.074.074 0 0 0 .026-.046c.557-5.744-.925-10.74-3.538-14.658a.077.077 0 0 0-.033-.027zM8.02 15.332c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.956 2.419-2.157 2.419zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.946 2.419-2.157 2.419z"/></svg>
                    Discord
                </a>

                <a href="{{ route('auth.redirect', 'google') }}"
                   class="flex items-center justify-center gap-2 rounded-md py-3 bg-white hover:bg-gray-200 transition-all duration-300 text-black font-bold uppercase text-sm tracking-widest shadow-lg">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    Google
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
