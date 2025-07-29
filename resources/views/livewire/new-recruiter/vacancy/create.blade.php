<div>
    <livewire:navigation-menu />

    <x-main-content>
        <div class="max-w-7xl mx-auto p-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-lg shadow-sm border border-primary-100 p-8">
                        <h2 class="text-2xl font-semibold text-primary-700 mb-2">Criar Nova Vaga</h2>
                        <p class="text-primary-500 mb-8">Preencha as informações da vaga que deseja publicar</p>

                        <form wire:submit.prevent="save" class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-primary-700 mb-2">
                                    Título da Vaga
                                </label>

                                <x-form.input
                                    id="title"
                                    name="title"
                                    type="text"
                                    placeholder="Ex: Desenvolvedor Frontend React Sênior"
                                    wire:model="title"
                                    >
                                    <x-slot name="icon">
                                        <x-svg.pencil class="w-5 h-5 text-gray-400" />
                                    </x-slot>
                                </x-form.input>

                                <div class="mt-2 text-red-500 text-sm">
                                    @error('title') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-primary-700 mb-2">
                                    Descrição da Vaga
                                </label>
                                <textarea id="description" name="description" rows="4" wire:model="description"
                                    placeholder="Descreva as responsabilidades, requisitos e benefícios da vaga..."
                                    class="w-full px-4 py-3 bg-primary-50 border border-primary-200 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 outline-none transition-colors text-primary-700 placeholder-primary-400 resize-none"></textarea>

                                    <div class="mt-2 text-red-500 text-sm">
                                        @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                            </div>

                            <div>
                                <label for="company" class="block text-sm font-medium text-primary-700 mb-2">
                                    Empresa
                                </label>

                                <x-form.input
                                    id="company"
                                    name="company"
                                    type="text"
                                    placeholder="Nome da empresa"
                                    wire:model="company"
                                >
                                    <x-slot name="icon">
                                        <x-svg.building class="w-5 h-5 text-gray-400" />
                                    </x-slot>
                                </x-form.input>

                                <div class="mt-2 text-red-500 text-sm">
                                    @error('company') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-primary-700 mb-2">
                                        Cidade
                                    </label>

                                    <x-form.input
                                        id="city"
                                        name="city"
                                        type="text"
                                        placeholder="São Paulo"
                                        wire:model="city"
                                    >
                                        <x-slot name="icon">
                                            <x-svg.map-bin class="w-5 h-5 text-gray-400" />
                                        </x-slot>
                                    </x-form.input>

                                    <div class="mt-2 text-red-500 text-sm">
                                        @error('city') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="state" class="block text-sm font-medium text-primary-700 mb-2">
                                        Estado
                                    </label>
                                    <select id="state" name="state" wire:model="state"
                                        class="w-full px-4 py-3 bg-primary-50 border border-primary-200 rounded-lg focus:ring-2 focus:ring-secondary-500 focus:border-secondary-500 outline-none transition-colors text-primary-700">
                                        <option value="">Selecione o estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                    
                                    <div class="mt-2 text-red-500 text-sm">
                                        @error('state') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="salary" class="block text-sm font-medium text-primary-700 mb-2">
                                    Faixa Salarial
                                </label>

                                <x-form.input
                                    id="salary"
                                    name="salary"
                                    type="text"
                                    placeholder="R$ 8.000 - R$ 12.000"
                                    wire:model="salary"
                                >
                                    <x-slot name="icon">
                                        <x-svg.currency-dollar class="w-5 h-5 text-gray-400" />
                                    </x-slot>
                                </x-form.input>

                                <div class="mt-2 text-red-500 text-sm">
                                    @error('salary') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-primary-700 mb-3">
                                        Tipo de Trabalho
                                    </label>
                                    <div class="space-y-3">
                                        <label class="flex items-center">
                                            <input type="radio" name="type" value="full-time" wire:model="type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">Tempo Integral</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="type" value="part-time" wire:model="type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">Meio Período</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="type" value="contract" wire:model="type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">Contrato</span>
                                        </label>
                                    </div>

                                    <div class="mt-2 text-red-500 text-sm">
                                        @error('type') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-primary-700 mb-3">
                                        Tipo de Contrato
                                    </label>
                                    <div class="space-y-3">
                                        <label class="flex items-center">
                                            <input type="radio" name="contract_type" value="pj" wire:model="contract_type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">CLT</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="contract_type" value="clt"  wire:model="contract_type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">PJ</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="contract_type" value="trainee"  wire:model="contract_type"
                                                class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                            <span class="ml-2 text-primary-700">Trainee</span>
                                        </label>
                                    </div>

                                    <div class="mt-2 text-red-500 text-sm">
                                        @error('contract_type') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-primary-700 mb-3">
                                    Modalidade de Trabalho
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <label
                                        class="flex items-center p-4 bg-primary-50 border border-primary-200 rounded-lg cursor-pointer hover:bg-primary-100 transition-colors">
                                        <input type="radio" name="location" value="on-site" wire:model="location"
                                            class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                        <span class="ml-2 text-primary-700 font-medium">Presencial</span>
                                    </label>
                                    <label
                                        class="flex items-center p-4 bg-primary-50 border border-primary-200 rounded-lg cursor-pointer hover:bg-primary-100 transition-colors">
                                        <input type="radio" name="location" value="remote" wire:model="location"
                                            class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                        <span class="ml-2 text-primary-700 font-medium">Remoto</span>
                                    </label>
                                    <label
                                        class="flex items-center p-4 bg-primary-50 border border-primary-200 rounded-lg cursor-pointer hover:bg-primary-100 transition-colors">
                                        <input type="radio" name="location" value="hybrid" wire:model="location"
                                            class="w-4 h-4 text-secondary-500 border-primary-300 focus:ring-secondary-500" />
                                        <span class="ml-2 text-primary-700 font-medium">Híbrido</span>
                                    </label>
                                </div>

                                <div class="mt-2 text-red-500 text-sm">
                                    @error('location') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="stacks" class="block text-sm font-medium text-primary-700 mb-2">
                                    Tecnologias/Habilidades
                                </label>

                                <x-form.input
                                    id="stacks"
                                    name="stacks"
                                    type="text"
                                    placeholder="React, TypeScript, Node.js, PostgreSQL (separadas por vírgula)"
                                    wire:model="stacks"
                                >
                                    <x-slot name="icon">
                                        <x-svg.code-slash class="w-5 h-5 text-gray-400" />
                                    </x-slot>
                                </x-form.input>

                                <div class="mt-2 text-red-500 text-sm">
                                    @error('stacks') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="space-y-4">
                                <x-form.button type="submit" class="w-full">
                                    Criar Vaga
                                </x-form.button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border border-primary-100 p-6 sticky top-6">
                        <div class="space-y-4">
                            <div class="pt-2">
                                <a href="{{ route('vacancies.index.recruiter') }}" wire:navigate
                                    class="w-full bg-primary-100 hover:bg-primary-200 text-primary-700 font-medium py-3 px-24 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 shadow-lg hover:shadow-xl">
                                    Voltar
                                </a>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-primary-100">
                            <h3 class="text-sm font-medium text-primary-700 mb-3">Dicas para uma boa vaga</h3>
                            <ul class="space-y-2 text-xs text-primary-600">
                                <li class="flex items-start">
                                    <x-svg.check class="w-3 h-3 text-secondary-500 mt-0.5 mr-2 flex-shrink-0" />
                                    Use um título claro e específico
                                </li>
                                <li class="flex items-start">
                                    <x-svg.check class="w-3 h-3 text-secondary-500 mt-0.5 mr-2 flex-shrink-0" />
                                    Descreva responsabilidades e requisitos
                                </li>
                                <li class="flex items-start">
                                    <x-svg.check class="w-3 h-3 text-secondary-500 mt-0.5 mr-2 flex-shrink-0" />
                                    Inclua faixa salarial transparente
                                </li>
                                <li class="flex items-start">
                                    <x-svg.check class="w-3 h-3 text-secondary-500 mt-0.5 mr-2 flex-shrink-0" />
                                    Liste tecnologias específicas
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-main-content>
</div>
