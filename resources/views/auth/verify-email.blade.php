<x-layouts.app title="Verificación de correo">
    <div class="max-w-2xl mx-auto mt-10 p-8 bg-white rounded-lg shadow-md text-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Verifica tu correo electrónico</h2>

        <p class="text-gray-600 mb-6">
            ¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar?
        </p>

        @if (session('message') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste al registrarte.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                    class="bg-slate-800 text-white px-6 py-2 rounded hover:bg-slate-700 transition">
                Reenviar correo de verificación
            </button>
        </form>
    </div>
</x-layouts.app>
