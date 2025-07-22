<div>
    <livewire:navigation-menu />

    <x-main-content>
        <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-zallpy-green text-white px-2 py-1 rounded text-sm font-bold mr-2">Z</div>
                    <span class="text-xl font-semibold text-gray-900">Empresa X</span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Sobre a empresa</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Vagas</a>
                    <div class="relative">
                        <select class="text-gray-600 bg-transparent border-none outline-none cursor-pointer">
                            <option>Português</option>
                        </select>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @foreach ($this->vacancies as $vacancy)
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Company Info -->
            <div class="space-y-6">
                <!-- Social Share -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Compartilhar vaga:</span>
                    <div class="flex space-x-2">
                        <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center">
                            <span class="text-white text-xs font-bold">f</span>
                        </div>
                        <div class="w-8 h-8 bg-blue-500 rounded flex items-center justify-center">
                            <span class="text-white text-xs font-bold">in</span>
                        </div>
                        <div class="w-8 h-8 bg-green-500 rounded flex items-center justify-center">
                            <span class="text-white text-xs font-bold">W</span>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900">
                    Banco de Talentos {{ $vacancy->company }} 🚀💚
                </h1>

                <!-- Location -->
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{  $vacancy->contract_type }} • BR</span>
                </div>

                <!-- Company Description -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Muito prazer, somos a {{ $vacancy->company }}!</h2>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $vacancy->description }}. 🚀💚
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        Somos movidos por inovação, agindo sempre com integridade, valorizando as pessoas e trabalhando com
                        compromisso.
                    </p>

                    <p class="text-gray-700">
                        Se identificou mas não encontrou a vaga ideal para você? Faça seu cadastro e <strong>#Vempraz!</strong>
                    </p>
                </div>

                <!-- About Company Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900">Sobre a empresa</h3>
                    <p class="text-gray-700 font-medium">Somos especialistas em tecnologia</p>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $vacancy->description }}.
                    </p>

                    <p class="text-gray-700 font-medium">Vem ser Zallpy!</p>

                    <p class="text-gray-700 leading-relaxed">
                        Mais do que uma empresa que gera empregos, a Zallpy é uma criadora de oportunidades, descobrindo
                        e formando talentos para o mercado que mais cresce no mundo.
                    </p>

                    <p class="text-gray-700 font-medium">Vem fazer carreira na Zallpy.</p>
                </div>
            </div>

            <!-- Right Column - Application Form -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <form class="space-y-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Seu nome completo"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Seu melhor email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" placeholder="Seu melhor email"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Celular com DDD <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <select class="px-3 py-2 border border-gray-300 rounded-l-md bg-white focus:outline-none focus:ring-2 focus:ring-zallpy-purple">
                                <option>🇧🇷 +55</option>
                            </select>
                            <input type="tel" placeholder="+55"
                                   class="flex-1 px-3 py-2 border-t border-r border-b border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                        </div>
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            LinkedIn <span class="text-red-500">*</span>
                        </label>
                        <input type="url" placeholder="https://linkedin.com/in/seu-perfil"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                        <p class="text-xs text-zallpy-purple mt-1">
                            <a href="#" class="underline">Obtenha o link do seu perfil do linkedin</a><br>
                            (Copie o link do seu perfil do LinkedIn e cole no campo acima)
                        </p>
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            País de origem <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                            <option>Selecione o país</option>
                            <option>Brasil</option>
                        </select>
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Informe sua cidade"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                    </div>

                    <!-- Resume -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Currículo <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-purple-50">
                            <button type="button" class="text-zallpy-purple font-medium">
                                + Anexar currículo
                            </button>
                        </div>
                    </div>

                    <!-- Expected Salary -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Remuneração esperada <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="R$ 0.000,00"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-zallpy-purple focus:border-transparent">
                    </div>

                    <!-- Contract Type -->
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

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-gray-400 text-white py-3 px-4 rounded-md font-medium hover:bg-gray-500 transition-colors">
                        Candidatar-se para a vaga
                    </button>

                    <!-- Privacy Policy -->
                    <p class="text-xs text-gray-600 text-center">
                        Ao fornecer seus dados pessoais, você concorda com o que está descrito
                        nesta <a href="#" class="text-zallpy-purple underline">Política de Privacidade</a>.
                    </p>
                </form>
            </div>
        </div>
    </main>
    @endforeach

    <!-- Footer -->
    <footer class="text-center py-8 text-sm text-gray-500">
        Todos os direitos reservados | © Intire 2025
    </footer>
    </x-main-content>
</div>
