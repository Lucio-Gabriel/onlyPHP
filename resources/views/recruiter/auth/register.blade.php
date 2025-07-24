<x-layouts.app>
    <div>
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center px-4 py-8">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-8">
                        <div class="flex justify-center mb-4">
                            <a href="{{ route('welcome') }}" wire:navigate class="flex items-center justify-center">
                                <img src="{{ asset('images/logo/php.png') }}" class="w-24" alt="logo">
                            </a>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Crie sua conta do recrutador</h1>
                        <p class="text-gray-600">Junte-se à comunidade <span class="font-semibold">OnlyPHP</span></p>
                    </div>

                    <a href="{{ route('auth.recruiter.linkedin.redirect') }}">
                        <div class="mt-6 py-3 text-center flex flex-row items-center justify-center space-x-2 text-white bg-blue-600 hover:bg-blue-700 shadow-lg hover:shadow-xl rounded-xl">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 11v5" /><path d="M8 8v.01" /><path d="M12 16v-5" /><path d="M16 16v-3a2 2 0 1 0 -4 0" /><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" /></svg>
                            <span> Registrar com LinkedIn </span>
                        </div>
                    </a>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-center text-gray-600">
                            Já tem uma conta?
                            <a href="{{ route('login.recruiter') }}" wire:navigate
                                class="text-secondary hover:text-primary font-semibold transition-colors">
                                Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
