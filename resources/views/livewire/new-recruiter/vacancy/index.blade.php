<div>
    <livewire:navigation-menu />

    <x-main-content>
        <div class="p-6">
            <div class="max-w-7xl mx-auto space-y-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            @if (Auth::check() && Auth::user()->isCandidate())
                                Área do Candidato
                            @else
                                Área do Recrutador
                            @endif
                        </h1>
                        <p class="text-gray-600 mt-1">Gerencie suas vagas e candidatos</p>
                    </div>
                    <button
                        class="bg-primary hover:bg-primary-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                        <x-svg.plus class="w-4 h-4" />
                        Nova Vaga
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-muted-foreground mb-1">Candidaturas Feitas</p>
                                <p class="text-3xl font-bold text-foreground mb-1 text-primary">24</p>
                                <p class="text-xs text-muted-foreground">Este mês</p>
                            </div>
                            <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center">
                                <x-svg.send class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-muted-foreground mb-1">Em Análise</p>
                                <p class="text-3xl font-bold text-foreground mb-1 text-primary">8</p>
                                <p class="text-xs text-muted-foreground">Aguardando retorno</p>
                            </div>
                            <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center">
                                <x-svg.stopwatch class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-muted-foreground mb-1">Respondidas</p>
                                <p class="text-3xl font-bold text-foreground mb-1 text-primary">5</p>
                                <p class="text-xs text-muted-foreground">Últimos 30 dias</p>
                            </div>
                            <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center">
                                <x-svg.arrow-trending-up class="w-6 h-6 text-primary" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="relative flex-1">
                            <x-svg.search class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                            <input type="text" placeholder="Buscar vagas..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:secondary-blue-500 outline-none">
                        </div>
                        <select
                            class="w-full sm:w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 outline-none">
                            <option>Todos os Status</option>
                            <option>Ativas</option>
                            <option>Pausadas</option>
                            <option>Fechadas</option>
                        </select>
                        <select
                            class="w-full sm:w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 outline-none">
                            <option>Todas as Cidades</option>
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Remoto</option>
                        </select>
                    </div>
                </div>

                @foreach ($this->vacancies as $vacancy)
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
                            <div class="p-6">
                                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-4">
                                    <div class="flex-1 space-y-3">
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                {{ $vacancy->title }}
                                            </h3>
                                            <span class="w-fit px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 border border-green-200">
                                                Ativa
                                            </span>
                                        </div>

                                        <p class="text-gray-700">
                                            {{ $vacancy->description }}
                                        </p>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                                            <div class="space-y-2">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2 0H7m5 0v-5a2 2 0 00-2-2H8a2 2 0 00-2 2v5m5 0V9a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h5z">
                                                        </path>
                                                    </svg>
                                                    <span><strong>Empresa:</strong> {{ $vacancy->company }} </span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    <span><strong>Local:</strong> {{ $vacancy->city }}, {{ strtoupper($vacancy->state) }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                                        </path>
                                                    </svg>
                                                    <span><strong>Salário:</strong> R$ {{ $vacancy->salary }}</span>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                    <span><strong>Tipo:</strong> {{ $vacancy->type }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                        </path>
                                                    </svg>
                                                    <span><strong>Contrato:</strong> {{ $vacancy->contract_type }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9">
                                                        </path>
                                                    </svg>
                                                    <span><strong>Modalidade:</strong> {{ $vacancy->location }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="px-2 py-1 text-xs font-medium bg-primary-100 text-primary-800 rounded-md">
                                                {{ $vacancy->stacks }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2 mt-12 min-w-fit">
                                        <button
                                            class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                                            <x-svg.pencil-square class="w-4 h-4" />
                                            Editar
                                        </button>
                                        <button
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                                            <x-svg.trash class="w-4 h-4" />
                                            Excluir
                                        </button>
                                        <button
                                            class="px-4 py-2 border border-gray-300 hover:bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                                            <x-svg.eye class="w-4 h-4" />
                                            Ver Candidatos
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-main-content>
</div>
