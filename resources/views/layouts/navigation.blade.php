<nav class="fixed top-0 left-0 right-0 w-full bg-white shadow-md z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mt-6 flex flex-col space-y-2"></div> 

        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Logo --}}
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-pink-600 font-bold text-2xl">Alkhabi</a>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500' }}">
                        Home
                    </a>
                    <a href="{{ route('pesan.create.step1') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('pesan.create.*') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500' }}">
                        Pesan
                    </a>
                    <a href="{{ route('riwayat.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('riwayat.index') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500' }}">
                        Riwayat
                    </a>
                    <a href="{{ route('pembayaran.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('pembayaran.*') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500' }}">
                        Pembayaran
                    </a>
                    <a href="{{ route('feedback.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('feedback.create') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500' }}">
                        Feedback
                    </a>
                </div>
            </div>
            
            <div class="hidden sm:flex items-center">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 text-sm font-medium bg-white text-gray-600 px-4 py-2 rounded-md hover:bg-gray-100 transition border border-gray-300">
                            <div class="w-5 h-5 bg-pink-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-1">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            @if (Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('filament.admin.pages.dashboard')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Dashboard Admin') }}
                            </x-dropdown-link>
                            @endif

                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V5a3 3 0 00-6 0v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500" aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="block h-6 w-6 menu-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6 menu-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="mobile-menu hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-pink-50 border-pink-500 text-pink-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }}">
                    Home
                </a>
                <a href="{{ route('pesan.create.step1') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('pesan.create.*') ? 'bg-pink-50 border-pink-500 text-pink-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }}">
                    Pesan
                </a>
                <a href="{{ route('riwayat.index') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('riwayat.index') ? 'bg-pink-50 border-pink-500 text-pink-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }}">
                    Riwayat
                </a>
                <a href="{{ route('pembayaran.index') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('pembayaran.*') ? 'bg-pink-50 border-pink-500 text-pink-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }}">
                    Pembayaran
                </a>
                <a href="{{ route('feedback.create') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('feedback.create') ? 'bg-pink-50 border-pink-500 text-pink-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }}">
                    Feedback
                </a>
            </div>
            
            @auth
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</nav>
