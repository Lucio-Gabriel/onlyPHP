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

                        {{-- <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span> --}}
                    </x-form.button>
                </form>

                <div class="mb-3 row">

                </div>

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
