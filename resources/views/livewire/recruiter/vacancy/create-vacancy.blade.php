<div>
    <livewire:navigation-menu/>

    <x-main-content>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 gap-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form class="space-y-6" wire:submit="save">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Título da Vaga <span class="text-red-500">*</span>
                            </label>

                            <x-form.input
                                id="titulo"
                                name="titulo"
                                type="text"
                                placeholder="Título da Vaga"
                                wire:model="form.title"
                            >
                                <x-slot name="icon">
                                    <x-svg.user
                                        class="w-5 h-5 text-gray-400"
                                    />
                                </x-slot>
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.title') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Descrição da Vaga <span class="text-red-500">*</span>
                            </label>

                            <x-form.input
                                id="description"
                                name="description"
                                type="text"
                                placeholder="Descrição"
                                wire:model="form.description"
                            >
                                <x-slot name="icon">
                                    <x-svg.envelope
                                        class="w-5 h-5 text-gray-400"
                                    />
                                </x-slot>
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.description') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Empresa <span class="text-red-500">*</span>
                            </label>
                            <div class="w-full">
                                <x-form.input
                                    id="company"
                                    name="company"
                                    type="text"
                                    placeholder="Nome da Empresa"
                                    wire:model="form.company"
                                    class="flex-1 rounded-r-md"
                                >
                                    <x-slot name="icon">
                                        <x-svg.phone
                                            class="w-5 h-5 text-gray-400"
                                        />
                                    </x-slot>
                                </x-form.input>
                            </div>
                            <p class="mt-0.5"> @error('form.company') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Stacks
                            </label>

                            <x-form.input
                                id="stacks"
                                name="stacks"
                                type="text"
                                placeholder="Digite as Stacks"
                                wire:model="form.stacks"
                            >
                                <x-slot name="icon">
                                    <x-svg.linkedin
                                        class="w-5 h-5 text-gray-400"
                                    />
                                </x-slot>
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.stacks') <span class="text-red-500">{{ $message }}</span> @enderror</p>

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Cidade <span class="text-red-500">*</span>
                            </label>

                            <x-form.input
                                id="city"
                                name="city"
                                type="text"
                                placeholder="Informe sua cidade"
                                wire:model="form.city"
                            >
                                <x-slot name="icon">
                                    <x-svg.map-bin
                                        class="w-5 h-5 text-gray-400"
                                    />
                                </x-slot>
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.city') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                               Estado <span class="text-red-500">*</span>
                            </label>
                            <x-form.input
                                id="state"
                                name="state"
                                type="text"
                                placeholder="Digite o Estado com Apenas duas Letras ex(SP)"
                                wire:model="form.state"
                                maxlength="2"
                            >
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.state') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Remuneração do Cargo
                            </label>

                            <x-form.input
                                id="salary"
                                name="salary"
                                type="text"
                                placeholder="R$ 0.000,00"
                                wire:model="form.salary"
                            >
                                <x-slot name="icon">
                                    <x-svg.currency-dollar
                                        class="w-5 h-5 text-gray-400"
                                    />
                                </x-slot>
                            </x-form.input>
                            <p class="mt-0.5"> @error('form.salary') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de contrato <span class="text-red-500">*</span>
                            </label>
                            <div class="flex space-x-4">
                                @foreach($contract_types as $contract_type)
                                    <label class="flex items-center">
                                        <input wire:model="form.contract_type" type="radio" name="contract"
                                               value="{{$contract_type->value}}" class="mr-2">
                                        <span class="text-sm text-gray-700">{{$contract_type->name}}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="mt-0.5"> @error('form.contract_type') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Período <span class="text-red-500">*</span>
                            </label>
                            <div class="flex space-x-4">
                                @foreach($types as $type)
                                    <label class="flex items-center">
                                        <input wire:model="form.type" type="radio" name="type" value="{{$type->value}}"
                                               class="mr-2">
                                        <span class="text-sm text-gray-700">{{$type->name}}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="mt-0.5"> @error('form.type') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Localização <span class="text-red-500">*</span>
                            </label>
                            <div class="flex space-x-4">
                                @foreach($locations as $location)
                                    <label class="flex items-center">
                                        <input wire:model="form.location" type="radio" name="location" value="{{$location->value}}"
                                               class="mr-2">
                                        <span class="text-sm text-gray-700">{{$location->name}}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="p-0.5"> @error('form.location') <span class="text-red-500">{{ $message }}</span> @enderror</p>
                        </div>

                        <x-form.button type="submit"
                                       class="w-full bg-gray-400 text-white py-3 px-4 rounded-md font-medium hover:bg-gray-500 transition-colors">
                            Publicar Vaga
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
    </x-main-content>
</div>
