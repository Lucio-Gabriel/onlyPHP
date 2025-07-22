<div>
    <livewire:navigation-menu />

    <x-main-content>
        <div class="bg-background font-sans">
            <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-foreground mb-6">Sua Dashboard</h2>
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
                </section>

                <section>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-foreground">Vagas Recentes</h2>
                        <button
                            class="flex items-center space-x-1 text-primary hover:text-primary/80 duration-300 transition-colors">
                            <x-svg.eye class="w-4 h-4" />
                            <span class="text-sm font-medium">Ver todas</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        @foreach ($this->vacancies as $vacancy)
                            <div
                                class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold text-foreground mb-1">{{ $vacancy->title }}</h3>
                                    <p class="text-sm text-muted-foreground font-medium">{{ $vacancy->company }}</p>
                                </div>

                                <div class="mb-4">
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">
                                            {{ $vacancy->stacks }}</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-4 mb-4 text-sm text-muted-foreground">
                                    <div class="flex items-center space-x-1">
                                        <x-svg.map-bin class="w-3.5 h-3.5 text-muted-foreground" />
                                        <span>{{ $vacancy->city }}, {{ strtoupper($vacancy->state) }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <x-svg.stopwatch class="w-3.5 h-3.5 text-muted-foreground" />
                                        <span>{{ $vacancy->contract_type }} - {{ $vacancy->location }}</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4 border-t border-border">
                                    <span class="text-xs text-muted-foreground"> {{ $vacancy->created_at }} </span>

                                    <div class="flex space-x-2">
                                        <button
                                            class="flex items-center space-x-1 px-3 py-2 border border-border rounded-lg hover:bg-muted transition-colors text-sm">
                                            <x-svg.external-link class="w-3.5 h-3.5" />
                                            <span>Ver vaga</span>
                                        </button>
                                        <button
                                            class="flex items-center space-x-1 px-3 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 duration-300 transition-colors text-sm font-medium">
                                            <x-svg.send class="w-3.5 h-3.5" />
                                            <span>Candidatar-se</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{-- 
                        <div
                            class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-foreground mb-1">Full Stack PHP Developer</h3>
                                <p class="text-sm text-muted-foreground font-medium">Startup Inovadora</p>
                            </div>

                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">PHP</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Symfony</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Vue.js</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">PostgreSQL</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">AWS</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-4 mb-4 text-sm text-muted-foreground">
                                <div class="flex items-center space-x-1">
                                    <x-svg.map-bin class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>Rio de Janeiro, RJ</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <x-svg.stopwatch class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>PJ - Híbrido</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-border">
                                <span class="text-xs text-muted-foreground">Há 3 dias</span>

                                <div class="flex space-x-2">
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 border border-border rounded-lg hover:bg-muted transition-colors text-sm">
                                        <x-svg.external-link class="w-3.5 h-3.5" />
                                        <span>Ver vaga</span>
                                    </button>
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 duration-300 transition-colors text-sm font-medium">
                                        <x-svg.send class="w-3.5 h-3.5" />
                                        <span>Candidatar-se</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-foreground mb-1">Desenvolvedor Backend PHP</h3>
                                <p class="text-sm text-muted-foreground font-medium">E-commerce Líder</p>
                            </div>

                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">PHP
                                        8</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">CodeIgniter</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">MySQL</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Git</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Linux</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-4 mb-4 text-sm text-muted-foreground">
                                <div class="flex items-center space-x-1">
                                    <x-svg.map-bin class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>Belo Horizonte, MG</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <x-svg.stopwatch class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>CLT - Presencial</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-border">
                                <span class="text-xs text-muted-foreground">Há 5 dias</span>

                                <div class="flex space-x-2">
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 border border-border rounded-lg hover:bg-muted transition-colors text-sm">
                                        <x-svg.external-link class="w-3.5 h-3.5" />
                                        <span>Ver vaga</span>
                                    </button>
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 duration-300 transition-colors text-sm font-medium">
                                        <x-svg.send class="w-3.5 h-3.5" />
                                        <span>Candidatar-se</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-card rounded-xl border border-border p-6 hover:shadow-lg transition-all duration-200">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-foreground mb-1">PHP Developer - Fintech</h3>
                                <p class="text-sm text-muted-foreground font-medium">FinTech Solutions</p>
                            </div>

                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">PHP</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Laravel</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">PostgreSQL</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Redis</span>
                                    <span
                                        class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-medium rounded-full">Kubernetes</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-4 mb-4 text-sm text-muted-foreground">
                                <div class="flex items-center space-x-1">
                                    <x-svg.map-bin class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>Brasília, DF</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <x-svg.stopwatch class="w-3.5 h-3.5 text-muted-foreground" />
                                    <span>CLT - Remoto</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-border">
                                <span class="text-xs text-muted-foreground">Há 1 semana</span>

                                <div class="flex space-x-2">
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 border border-border rounded-lg hover:bg-muted transition-colors text-sm">

                                        <x-svg.external-link class="w-3.5 h-3.5" />
                                        <span>Ver vaga</span>
                                    </button>
                                    <button
                                        class="flex items-center space-x-1 px-3 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 duration-300 transition-colors text-sm font-medium">
                                        <x-svg.send class="w-3.5 h-3.5" />
                                        <span>Candidatar-se</span>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </section>

                <section class="mt-12 bg-card border border-border rounded-xl p-8 text-center">
                    <h3 class="text-xl font-semibold text-foreground mb-2">
                        Pronto para encontrar sua próxima oportunidade?
                    </h3>
                    <p class="text-muted-foreground mb-6">
                        Explore centenas de vagas PHP disponíveis na nossa plataforma
                    </p>
                    <button
                        class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-primary/90 transition-colors">
                        Explorar Todas as Vagas
                    </button>
                </section>
            </mai>
        </div>
    </x-main-content>
</div>
