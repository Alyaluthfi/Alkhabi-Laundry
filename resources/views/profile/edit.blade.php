<head>
    <title>Alkhabi Laundry - Edit Profile</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="px-4 sm:px-0">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Pengaturan Profil</h2>
                <p class="mt-1 text-md text-gray-500">Kelola informasi akun, kata sandi, dan privasi Anda di sini.</p>
            </div>

            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-2xl border border-gray-200">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-2xl border border-gray-200">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-2xl border border-gray-200">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
