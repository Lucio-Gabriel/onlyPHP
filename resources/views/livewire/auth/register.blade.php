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
                <form class="space-y-6">
                    <div>
                        <x-form.label for="fullName" label="Nome completo" />

                        <x-form.input id="fullName" name="fullName" type="text" placeholder="Seu nome completo"
                            wire:model="fullName">
                            <x-slot name="icon">
                                <x-svg.envelope class="w-5 h-5 text-gray-400" />
                            </x-slot>
                        </x-form.input>

                        <div class="mt-3 text-sm">
                            @if ($errors->has('fullName'))
                                <span class="text-red-500">{{ $errors->first('fullName') }}</span>
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
                        <x-form.label for="confirmPassword" label="Confirmar senha" />

                        <x-form.input id="confirmPassword" name="confirmPassword" type="password" placeholder="••••••••"
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

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox"
                                class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-secondary focus:ring-2" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-700">
                                Aceito os
                                <a href="#" class="text-secondary hover:text-primary transition-colors">
                                    termos de uso
                                </a>
                                e
                                <a href="#" class="text-secondary hover:text-primary transition-colors">
                                    política de privacidade
                                </a>
                            </label>
                        </div>
                    </div>

                    <x-form.button type="submit">
                        Criar conta
                    </x-form.button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-center text-gray-600">
                        Já tem uma conta?
                        <a href="{{ route('login.candidate') }}" wire:navigate class="text-secondary hover:text-primary font-semibold transition-colors">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
