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
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Crie sua conta</h1>
                    <p class="text-gray-600">Junte-se à comunidade <span class="font-semibold">OnlyPHP</span></p>
                </div>
                
                <form wire:submit.prevent="register" class="space-y-6">
                    <div>
                        <x-form.label for="name" label="Nome completo" />

                        <x-form.input id="name" name="name" type="text" placeholder="Seu nome completo"
                            wire:model="name">
                            <x-slot name="icon">
                                <x-svg.envelope class="w-5 h-5 text-gray-400" />
                            </x-slot>
                        </x-form.input>

                        <div class="mt-3 text-sm">
                            @if ($errors->has('name'))
                                <span class="text-red-500">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <x-form.label for="email" label="E-mail" />

                        <x-form.input id="email" name="email" type="email" placeholder="seu@email.com"
                            wire:model="email">
                            <x-slot name="icon">
                                <x-svg.envelope class="w-5 h-5 text-gray-400" />
                            </x-slot>
                        </x-form.input>

                        <div class="mt-3 text-sm">
                            @if ($errors->has('email'))
                                <span class="text-red-500">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <x-form.label for="password" label="Senha" />

                        <x-form.input id="password" name="password" type="password" placeholder="••••••••"
                            wire:model="password">
                            <x-slot name="icon">
                                <x-svg.lock class="w-5 h-5 text-gray-400" />
                            </x-slot>
                        </x-form.input>

                        <div class="mt-3 text-sm">
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                            @if (session()->has('error'))
                                <span class="text-red-500">{{ session('error') }}</span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <x-form.label for="password_confirmation" label="Confirmar senha" />

                        <x-form.input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="••••••••" wire:model="password_confirmation">
                            <x-slot name="icon">
                                <x-svg.lock class="w-5 h-5 text-gray-400" />
                            </x-slot>
                        </x-form.input>

                        <div class="mt-3 text-sm">
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                            @if (session()->has('error'))
                                <span class="text-red-500">{{ session('error') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" wire:model="remember"
                                class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-secondary focus:ring-2" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-700">
                                Lembrar-me
                            </label>
                        </div>
                    </div>

                    <x-form.button type="submit">
                        Criar conta
                    </x-form.button>
                </form>

                <a href="{{ route('auth.linkedin.redirect') }}">
                    <div class="mt-6 py-3 text-center flex flex-row items-center justify-center space-x-2 text-white bg-blue-600 hover:bg-blue-700 shadow-lg hover:shadow-xl rounded-xl">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 11v5" /><path d="M8 8v.01" /><path d="M12 16v-5" /><path d="M16 16v-3a2 2 0 1 0 -4 0" /><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" /></svg>
                        <span> Registrar com LinkedIn </span>
                    </div>
                </a>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-center text-gray-600">
                        Já tem uma conta?
                        <a href="{{ route('login.candidate') }}" wire:navigate
                            class="text-secondary hover:text-primary font-semibold transition-colors">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
