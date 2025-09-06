<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 w-full bg-white shadow-md z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-6 flex flex-col space-y-2">

        </div>
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-pink-600 font-bold text-2xl">Alkhabi</span>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#hero"
                        class="border-pink-500 text-pink-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Beranda
                    </a>
                    <a href="#layanan"
                        class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Layanan
                    </a>
                    <a href="#harga"
                        class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Harga
                    </a>
                    <a href="#tentang"
                        class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Tentang Kami
                    </a>
                    <a href="#kontak"
                        class="border-transparent text-gray-500 hover:border-pink-300 hover:text-pink-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Kontak
                    </a>
                </div>
            </div>
            <!-- Login & Register: Pojok Kanan -->
            <div class="hidden sm:flex items-center space-x-2 ml-auto">
                <a href="{{ route('filament.u.auth.login') }}"
                    class="text-sm font-medium bg-white text-red-400 px-4 py-2 rounded-md hover:bg-gray-200 transition shadow">
                    Login
                </a>
                <a href="{{ route('filament.u.auth.register') }}"
                    class="text-sm font-medium bg-red-400 text-white px-4 py-2 rounded-md hover:bg-red-500 transition shadow">
                    Register
                </a>
            </div>
        </div>

        <div class="-mr-2 flex items-center sm:hidden">
            <button type="button"
                class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500"
                aria-expanded="false">
                <span class="sr-only">Buka menu utama</span>
                <!-- Icon when menu is closed -->
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Icon when menu is open -->
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    </div>
</nav>