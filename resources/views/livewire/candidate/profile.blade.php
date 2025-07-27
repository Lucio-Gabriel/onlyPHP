<div>
    <livewire:navigation-menu />

    <x-main-content>
        <div class="bg-background font-sans">
            <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-foreground mb-6">
                        Perfil do Candidato
                    </h2>
                    @if ($profile)
                        {{-- Seção de exibição de dados do perfil --}}
                        <div class="bg-card rounded-xl border border-border p-6 shadow-sm mb-4">
                            <div class="flex items-center space-x-4 mb-4">
                                @if ($profile->profile_picture_path)
                                    <img src="{{ Storage::disk('s3')->url($profile->profile_picture_path) }}" alt="Foto de Perfil" class="w-24 h-24 rounded-full object-cover border border-border">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-4xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="text-foreground text-xl font-semibold">{{ $profile->full_name }}</p>
                                    <p class="text-gray-500">{{ $profile->email }}</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-foreground"><span class="font-bold">Stack Principal:</span> {{ implode(', ', (array) $profile->main_stack) }}</p>
                                @if ($profile->github_link)
                                    <p class="text-foreground"><span class="font-bold">GitHub:</span> <a href="{{ $profile->github_link }}" target="_blank" class="text-blue-500 hover:underline">{{ $profile->github_link }}</a></p>
                                @endif
                                @if ($profile->portfolio_link)
                                    <p class="text-foreground"><span class="font-bold">Portfólio:</span> <a href="{{ $profile->portfolio_link }}" target="_blank" class="text-blue-500 hover:underline">{{ $profile->portfolio_link }}</a></p>
                                @endif
                                @if ($profile->linkedin_link)
                                    <p class="text-foreground"><span class="font-bold">LinkedIn:</span> <a href="{{ $profile->linkedin_link }}" target="_blank" class="text-blue-500 hover:underline">{{ $profile->linkedin_link }}</a></p>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600 mb-4">Nenhum perfil encontrado. Preencha os dados abaixo para criar um.</p>
                    @endif
                </section>

                {{-- Formulário de Edição de Dados do Perfil --}}
                <form wire:submit.prevent="updateProfile" class="bg-card shadow-sm rounded-xl border border-border p-6 mb-4">
                    <h2 class="text-2xl font-bold mb-6 text-foreground">Editar Dados do Perfil</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="full_name" class="block text-foreground text-sm font-bold mb-2">Nome Completo:</label>
                            <input type="text" id="full_name" wire:model="full_name"
                                class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                            @error('full_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-foreground text-sm font-bold mb-2">E-mail:</label>
                            <input type="email" id="email" wire:model="email"
                                class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="main_stack" class="block text-foreground text-sm font-bold mb-2">Stack Principal (selecione uma ou mais):</label>
                        <select id="main_stack" wire:model="main_stack" multiple
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline h-32">
                            <option value="PHP">PHP</option>
                            <option value="Laravel">Laravel</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="React">React</option>
                            <option value="Vue.js">Vue.js</option>
                            <option value="Angular">Angular</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Ruby on Rails">Ruby on Rails</option>
                            <option value="Java">Java</option>
                            <option value="Spring Boot">Spring Boot</option>
                            <option value="Node.js">Node.js</option>
                            <option value="Express.js">Express.js</option>
                            <option value="Go">Go</option>
                            <option value="C#">C#</option>
                            <option value=".NET">.NET</option>
                            <option value="SQL">SQL</option>
                            <option value="NoSQL">NoSQL</option>
                            <option value="DevOps">DevOps</option>
                            <option value="Cloud Computing">Cloud Computing</option>
                            <option value="Mobile Development">Mobile Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Data Science">Data Science</option>
                            <option value="Machine Learning">Machine Learning</option>
                            <option value="Cybersecurity">Cybersecurity</option>
                            <option value="Blockchain">Blockchain</option>
                            <option value="Outro">Outro</option>
                        </select>
                        @error('main_stack') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="github_link" class="block text-foreground text-sm font-bold mb-2">Link do GitHub:</label>
                        <input type="url" id="github_link" wire:model="github_link" placeholder="https://github.com/seu-usuario"
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                        @error('github_link') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="portfolio_link" class="block text-foreground text-sm font-bold mb-2">Link do Portfólio:</label>
                        <input type="url" id="portfolio_link" wire:model="portfolio_link" placeholder="https://seu-portfolio.com"
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                        @error('portfolio_link') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="linkedin_link" class="block text-foreground text-sm font-bold mb-2">Link do LinkedIn:</label>
                        <input type="url" id="linkedin_link" wire:model="linkedin_link" placeholder="https://linkedin.com/in/seu-perfil"
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                        @error('linkedin_link') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            wire:loading.attr="disabled"
                            wire:target="updateProfile"
                        >
                            <span wire:loading.remove wire:target="updateProfile">Salvar Dados</span>
                            <span wire:loading wire:target="updateProfile">Salvando...</span>
                        </button>
                    </div>
                </form>

                {{-- Formulário de Upload de Currículo --}}
                <form wire:submit.prevent="uploadResume" class="bg-card shadow-sm rounded-xl border border-border p-6 mb-4">
                    <h2 class="text-2xl font-bold mb-6 text-foreground">Upload de Currículo</h2>

                    <div class="mb-4">
                        <label for="resumeFile" class="block text-foreground text-sm font-bold mb-2">
                            Upload de Currículo (PDF, DOC, DOCX - Max 2MB):
                        </label>
                        <input type="file" id="resumeFile" wire:model="resumeFile"
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                        @error('resumeFile')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        <div wire:loading wire:target="resumeFile" class="text-blue-500 text-sm mt-2">Carregando arquivo...</div>
                    </div>

                    @if ($profile && $profile->resume_url)
                        <div class="mb-4">
                            <p class="text-foreground text-sm font-bold mb-2">Currículo Atual:</p>
                            <a href="{{ $profile->resume_url }}" target="_blank"
                                class="text-blue-500 hover:underline">Ver Currículo</a>
                        </div>
                    @elseif ($profile && $profile->resume_path)
                        <div class="mb-4">
                            <p class="text-foreground text-sm font-bold mb-2">Currículo Atual (Caminho):</p>
                            <a href="{{ Storage::disk('s3')->url($profile->resume_path) }}" target="_blank"
                                class="text-blue-500 hover:underline">Ver Currículo (S3)</a>
                        </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            wire:loading.attr="disabled"
                            wire:target="uploadResume"
                        >
                            <span wire:loading.remove wire:target="uploadResume">Enviar Currículo</span>
                            <span wire:loading wire:target="uploadResume">Enviando...</span>
                        </button>
                    </div>
                </form>

                {{-- Formulário de Upload de Foto de Perfil --}}
                <form wire:submit.prevent="uploadProfilePicture" class="bg-card shadow-sm rounded-xl border border-border p-6 mb-4">
                    <h2 class="text-2xl font-bold mb-6 text-foreground">Upload de Foto de Perfil</h2>

                    <div class="mb-4">
                        <label for="profilePictureFile" class="block text-foreground text-sm font-bold mb-2">
                            Upload de Foto de Perfil (JPG, PNG - Max 2MB):
                        </label>
                        <input type="file" id="profilePictureFile" wire:model="profilePictureFile"
                            class="shadow appearance-none border border-border rounded w-full py-2 px-3 text-foreground leading-tight focus:outline-none focus:shadow-outline">
                        @error('profilePictureFile')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror

                        {{-- Adicionado isPreviewable() e verificação de existência para evitar TypeError --}}
                        @if ($profilePictureFile && method_exists($profilePictureFile, 'isPreviewable') && $profilePictureFile->isPreviewable())
                            <div class="mt-4">
                                <p class="text-foreground text-sm font-bold mb-2">Pré-visualização da Nova Foto:</p>
                                <img src="{{ $profilePictureFile->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover border border-border">
                            </div>
                        @elseif ($profile && $profile->profile_picture_path)
                            <div class="mt-4">
                                <p class="text-foreground text-sm font-bold mb-2">Foto de Perfil Atual:</p>
                                <img src="{{ Storage::disk('s3')->url($profile->profile_picture_path) }}" class="w-24 h-24 rounded-full object-cover border border-border">
                            </div>
                        @endif

                        <div wire:loading wire:target="profilePictureFile" class="text-blue-500 text-sm mt-2">Carregando foto...</div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            wire:loading.attr="disabled"
                            wire:target="uploadProfilePicture"
                        >
                            <span wire:loading.remove wire:target="uploadProfilePicture">Enviar Foto</span>
                            <span wire:loading wire:target="uploadProfilePicture">Enviando...</span>
                        </button>
                    </div>
                </form>
            </main>
        </div>
        <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2"></div>
    </x-main-content>

    {{-- Toast Notification Container --}}

    <script>
        document.addEventListener('livewire:initialized', () => {
            const toastContainer = document.getElementById('toast-container');
            let toastTimeout;

            // Function to show the toast
            function showToast(message, type = 'success') {
                // Clear any existing timeout to prevent overlapping toasts
                clearTimeout(toastTimeout);
                // Create toast element
                const toast = document.createElement('div');
                toast.className = `px-6 py-3 rounded-lg shadow-lg text-white font-semibold transition-all duration-300 ease-in-out transform translate-x-full opacity-0 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} max-w-xs w-full`;
                toast.textContent = message.message || message; // Use message directly if it's a string

                // Set background color based on type
                if (type === 'success') {
                    toast.classList.add('bg-green-500');
                } else if (type === 'error') {
                    toast.classList.add('bg-red-500');
                } else {
                    toast.classList.add('bg-gray-700'); // Default for info/other
                }

                // Append to container
                toastContainer.appendChild(toast);

                // Animate in
                setTimeout(() => {
                    toast.classList.remove('translate-x-full', 'opacity-0');
                    toast.classList.add('translate-x-0', 'opacity-100');
                }, 100); // Small delay to ensure transition works

                // Auto-hide after 5 seconds
                toastTimeout = setTimeout(() => {
                    toast.classList.remove('translate-x-0', 'opacity-100');
                    toast.classList.add('translate-x-full', 'opacity-0');
                    // Remove from DOM after transition
                    toast.addEventListener('transitionend', () => toast.remove(), { once: true });
                }, 5000);
                console.log('-------------ok-----------');
            }

            // Listen for Livewire 'message' and 'error' events
            // Usando argumentos posicionais, então event.detail será o valor diretamente
            Livewire.on('message', (message) => {
                // message é o payload direto, não event.detail.message
                if (message) { // Verificação simples se a mensagem existe
                    document.getElementById('toast-container').innerHTML = 'sddd'; // Limpa o container antes de mostrar a nova mensagem
                    showToast(message, 'success');
                } else {
                    console.warn('Livewire "message" event received without expected message payload:', message);
                }
            });

            Livewire.on('error', (message) => {
                // message é o payload direto, não event.detail.message
                if (message) { // Verificação simples se a mensagem existe
                    showToast(message, 'error');
                } else {
                    console.warn('Livewire "error" event received without expected message payload:', message);
                }
            });

            // Estes blocos foram mantidos para compatibilidade com session()->flash() que ainda pode ser usado por outras partes do Laravel
            // O ideal é que todos os flashes sejam convertidos para dispatch de eventos Livewire
            @if (session()->has('message'))
                showToast("{{ session('message') }}", 'success');

            @endif

            @if (session()->has('error'))
                showToast("{{ session('error') }}", 'error');
            @endif
        });
    </script>
</div>
