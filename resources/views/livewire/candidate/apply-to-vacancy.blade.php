<div>
    <livewire:navigation-menu />

    <x-main-content>
        @foreach ($this->vacancies as $vacancy)
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Banco de Talentos {{ $vacancy->company }}
                        </h1>

                        <div class="flex items-center text-sm text-gray-600 gap-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <x-svg.map-bin class="w-4 h-4 mr-1 text-muted-foreground" />
                                <span>{{ $vacancy->city }} • {{ strtoupper($vacancy->state) }}</span>
                            </div>

                            <div class="flex items-center text-sm text-gray-600">
                                <x-svg.stopwatch class="w-4 h-4 mr-1 text-muted-foreground" />
                                <span>{{ strtoupper($vacancy->contract_type) }} •
                                    {{ strtoupper($vacancy->location) }}</span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h2 class="text-lg font-semibold text-gray-900">Muito prazer, somos a
                                {{ $vacancy->company }}!</h2>

                            <p class="text-gray-700 leading-relaxed">
                                {{ $vacancy->description }}.
                            </p>

                            <p class="text-gray-700 leading-relaxed">
                                Somos movidos por inovação, agindo sempre com integridade, valorizando as pessoas e
                                trabalhando com
                                compromisso.
                            </p>

                            <p class="text-gray-700">
                                Se identificou mas não encontrou a vaga ideal para você? Faça seu cadastro e
                                <strong>#Vempraz!</strong>
                            </p>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">Sobre a empresa</h3>
                            <p class="text-gray-700 font-medium">Somos especialistas em tecnologia</p>

                            <p class="text-gray-700 leading-relaxed">
                                {{ $vacancy->description }}.
                            </p>

                            <p class="text-gray-700 font-medium">Vem ser Zallpy!</p>

                            <p class="text-gray-700 leading-relaxed">
                                Mais do que uma empresa que gera empregos, a Zallpy é uma criadora de oportunidades,
                                descobrindo
                                e formando talentos para o mercado que mais cresce no mundo.
                            </p>

                            <p class="text-gray-700 font-medium">Vem fazer carreira na Zallpy.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nome completo <span class="text-red-500">*</span>
                                </label>

                                <x-form.input 
                                    id="name" 
                                    name="name" 
                                    type="text"
                                    placeholder="Seu nome completo" 
                                    wire:model="name"
                                >
                                    <x-slot name="icon">
                                        <x-svg.user 
                                            class="w-5 h-5 text-gray-400" 
                                        />
                                    </x-slot>
                                </x-form.input>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Seu melhor email <span class="text-red-500">*</span>
                                </label>

                                <x-form.input 
                                    id="email" 
                                    name="email" 
                                    type="email"
                                    placeholder="Seu melhor email" 
                                    wire:model="email"
                                >
                                    <x-slot name="icon">
                                        <x-svg.envelope 
                                            class="w-5 h-5 text-gray-400" 
                                        />
                                    </x-slot>
                                </x-form.input>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Celular com DDD <span class="text-red-500">*</span>
                                </label>
                                <div class="w-full">
                                    <x-form.input 
                                        id="phone" 
                                        name="phone" 
                                        type="tel"
                                        placeholder="(00) 00000-0000" 
                                        wire:model="phone" 
                                        class="flex-1 rounded-r-md"
                                    >
                                        <x-slot name="icon">
                                            <x-svg.phone 
                                                class="w-5 h-5 text-gray-400" 
                                            />
                                        </x-slot>
                                    </x-form.input>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    LinkedIn <span class="text-red-500">*</span>
                                </label>

                                <x-form.input 
                                    id="linkedin" 
                                    name="linkedin" 
                                    type="url"
                                    placeholder="https://linkedin.com/in/seu-perfil" 
                                    wire:model="linkedin"
                                >
                                    <x-slot name="icon">
                                        <x-svg.linkedin 
                                            class="w-5 h-5 text-gray-400" 
                                        />
                                    </x-slot>
                                </x-form.input>

                                <p class="text-xs text-zallpy-purple mt-1">
                                    <a href="#" class="underline">Obtenha o link do seu perfil do linkedin</a><br>
                                    (Copie o link do seu perfil do LinkedIn e cole no campo acima)
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    País de origem <span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent">
                                    <option>Selecione o país</option>
                                    <option>Brasil</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Cidade <span class="text-red-500">*</span>
                                </label>
>
                                <x-form.input 
                                    id="city" 
                                    name="city" 
                                    type="text"
                                    placeholder="Informe sua cidade"
                                    wire:model="city"
                                >
                                    <x-slot name="icon">
                                        <x-svg.map-bin 
                                            class="w-5 h-5 text-gray-400" 
                                        />
                                    </x-slot>
                                </x-form.input>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Currículo <span class="text-red-500">*</span>
                                </label>
                                <div
                                    class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-purple-50">
                                    <button type="button" class="text-zallpy-purple font-medium">
                                        + Anexar currículo
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Remuneração esperada <span class="text-red-500">*</span>
                                </label>

                                <x-form.input 
                                    id="salary" 
                                    name="salary"
                                    type="text" 
                                    placeholder="R$ 0.000,00"
                                    wire:model="salary"
                                >
                                    <x-slot name="icon">
                                        <x-svg.currency-dollar 
                                            class="w-5 h-5 text-gray-400" 
                                        />
                                    </x-slot>
                                </x-form.input>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Tipo de contrato <span class="text-red-500">*</span>
                                </label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="contract" value="clt" class="mr-2">
                                        <span class="text-sm text-gray-700">CLT</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="contract" value="pj" class="mr-2">
                                        <span class="text-sm text-gray-700">PJ</span>
                                    </label>
                                </div>
                            </div>

                            <x-form.button type="submit"
                                class="w-full bg-gray-400 text-white py-3 px-4 rounded-md font-medium hover:bg-gray-500 transition-colors">
                                Candidatar-se para a vaga
                            </x-form.button>

                            <p class="text-xs text-gray-600 text-center">
                                Ao fornecer seus dados pessoais, você concorda com o que está descrito
                                nesta 
                                <a 
                                    href="#" 
                                    class="text-zallpy-purple underline"
                                >
                                    Política de Privacidade
                                </a>.
                            </p>
                        </form>
                    </div>
                </div>
            </main>
        @endforeach
    </x-main-content>
</div>
