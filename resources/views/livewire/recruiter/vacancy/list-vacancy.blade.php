<div>
    <livewire:navigation-menu/>
    <x-main-content>
        <div class="bg-background font-sans">
            <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-foreground mb-6">Sua Vagas</h2>
                </section>

                <section>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        @forelse($this->vacancies as $vacancy)
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
                                        <x-svg.map-bin class="w-3.5 h-3.5 text-muted-foreground"/>
                                        <span>{{ $vacancy->city }}, {{ strtoupper($vacancy->state) }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <x-svg.stopwatch class="w-3.5 h-3.5 text-muted-foreground"/>
                                        <span>{{ $vacancy->contract_type }} - {{ $vacancy->location }}</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4 border-t border-border">
                                    <span class="text-xs text-muted-foreground"> {{ $vacancy->created_at }} </span>

                                    <div class="flex space-x-2">
                                        <a href=" #" wire:navigate
                                           class="flex items-center space-x-1 px-3 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 duration-300 transition-colors text-sm font-medium">
                                            <x-svg.send class="w-3.5 h-3.5"/>
                                            <span>Editar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Nenhuma Vaga Cadastrada Em Seu Perfil</p>
                        @endforelse

                    </div>
                </section>
            </main>
            <div>{{ $this->vacancies->links() }}</div>
        </div>
    </x-main-content>
</div>
