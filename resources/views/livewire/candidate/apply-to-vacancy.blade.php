<div>
    <livewire:navigation-menu />

    <x-main-content>
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1  gap-8">
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
                            <x-form.button wire:click="apply"
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

                </div>
            </main>
    </x-main-content>
</div>
