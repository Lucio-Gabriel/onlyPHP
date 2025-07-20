<div x-data="{ sidebarOpen: false, userDropdownOpen: false }">
    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-primary dark:border-secondary">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button @click="sidebarOpen = !sidebarOpen" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <x-svg.bars class="w-6 h-6" />
                    </button>
                    <div class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/logo/php.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">onlyPHP</span>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div x-data="{ userDropdownOpen: false }" class="relative">
                            <button @click="userDropdownOpen = !userDropdownOpen"
                                class="flex items-center space-x-2 p-2 rounded-md hover:bg-secondary focus:outline-none duration-300">
                                <img src="https://i.pravatar.cc/150?img=3" alt="Avatar"
                                    class="w-8 h-8 rounded-full" />
                                <span
                                    class="hidden md:inline text-sm text-white font-medium">{{ Auth::user()->name }}</span>
                                <x-svg.arrow-low class="w-4 h-4 text-white" />
                            </button>

                            <div x-show="userDropdownOpen" @click.away="userDropdownOpen = false" x-transition
                                class="absolute right-0 border border-b-secondary mt-2 w-48 bg-primary rounded-md shadow-lg z-50">
                                <ul class="py-1 text-sm text-gray-700">
                                    <li>
                                        <a href="#"
                                            class="text-white block px-4 py-2 hover:bg-secondary duration-300">Perfil</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-white block px-4 py-2 hover:bg-secondary duration-300">Configurações</a>
                                    </li>
                                    <li>
                                        <button wire:click="logout"
                                            class="w-full text-left text-white block px-4 py-2 hover:bg-secondary duration-300">
                                            Sair
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full sm:translate-x-0'"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-primary dark:border-secondary"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-primary">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-secondary duration-300 group">

                        <x-svg.ui-check
                            class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />

                        <span class="ms-3">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-secondary group">
                        <x-svg.briefcase
                            class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Vagas
                        </span>
                        <span
                            class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-secondary duration-300 group">
                        <x-svg.file-earmark
                            class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Candidaturas
                        </span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            3
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-secondary duration-300 group">
                        <x-svg.person-lines-fill
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                        <span class="flex-1 ms-3 whitespace-nowrap">
                            Perfil
                        </span>
                    </a>
                </li>
                <li>
                <li>
                    <button wire:click="logout"
                        class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-secondary duration-300 group">
                        <x-svg.logout
                            class="shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
                        <span class="ml-3 whitespace-nowrap">
                            Sair
                        </span>
                    </button>
                </li>
                </li>
            </ul>
        </div>
    </aside>
</div>
