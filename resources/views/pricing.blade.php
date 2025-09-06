
<style>
    @keyframes pulse-subtle {
        50% {
            transform: scale(1.1);
        }
    }
    .animate-pulse-subtle {
        animation: pulse-subtle 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>

<div 
    id="harga" 
    class="relative bg-cover bg-center bg-no-repeat py-16 sm:py-24 z-0" 
    style="background-image: url('{{ asset('img/bg-pricing.jpg') }}');"
>
    <div class="absolute inset-0 bg-white/30 z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-20">
        <div class="lg:text-center">
            <h2 class="text-base text-pink-600 font-bold tracking-wide uppercase">Daftar Harga</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Harga Terjangkau untuk Semua Kebutuhan
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Pilih paket yang paling sesuai dengan kebutuhan Anda.
            </p>
        </div>

        <div class="mt-16">
            <div class="space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                
                <div class="relative flex flex-col bg-white border border-pink-200 rounded-lg shadow-sm p-8 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h3 class="text-xl font-medium text-pink-600">Regular</h3>
                    <p class="mt-4 text-gray-500">Untuk kebutuhan sehari-hari.</p>
                    
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">Rp 7.000</span>
                        <span class="text-base font-medium text-gray-500">/kg</span>
                    </p>

                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                            <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                            <p class="ml-3 text-base text-gray-500">Pewangi standar</p>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                            <p class="ml-3 text-base text-gray-500">Setrika rapi</p>
                        </li>
                         <li class="flex items-start">
                            <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                            <p class="ml-3 text-base text-gray-500">Proses 2 hari (48 jam) </p>
                        </li>
                    </ul>
                    <button onclick="handlePilihPaket()" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700 transition-all duration-300 transform hover:-translate-y-0.5">Pilih Paket</button>
                </div>

                <div class="relative flex flex-col bg-white border-2 border-pink-500 rounded-lg shadow-lg p-8">
                    <div class="absolute top-0 -translate-y-1/2 w-full flex justify-center">
                       <span class="bg-pink-500 text-white px-3 py-1 text-sm font-medium rounded-full shadow-md animate-pulse-subtle">Populer</span>
                    </div>

                    <h3 class="text-xl font-medium text-pink-600">Express</h3>
                    <p class="mt-4 text-gray-500">Untuk perawatan lebih.</p>

                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">Rp 12.000</span>
                        <span class="text-base font-medium text-gray-500">/kg</span>
                    </p>

                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                        </li>
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Pewangi premium</p>
                        </li>
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Setrika rapi</p>
                        </li>
                         <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Proses 1 hari (24 jam) </p>
                        </li>
                    </ul>
                    <button onclick="handlePilihPaket()" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700 transition-all duration-300 transform hover:-translate-y-0.5">Pilih Paket</button>
                </div>

                <div class="relative flex flex-col bg-white border border-pink-200 rounded-lg shadow-sm p-8 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <h3 class="text-xl font-medium text-pink-600">Kilat</h3>
                    <p class="mt-4 text-gray-500">Untuk kebutuhan mendesak.</p>
                    
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">Rp 15.000</span>
                        <span class="text-base font-medium text-gray-500">/kg</span>
                    </p>

                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Cuci & lipat</p>
                        </li>
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Pewangi premium</p>
                        </li>
                        <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Setrika Rapi</p>
                        </li>
                         <li class="flex items-start">
                           <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                           <p class="ml-3 text-base text-gray-500">Proses 1/2 hari (6 jam) </p>
                        </li>
                    </ul>
                    <button onclick="handlePilihPaket()" class="mt-8 block w-full bg-pink-600 border border-pink-600 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-pink-700 transition-all duration-300 transform hover:-translate-y-0.5">Pilih Paket</button>
                </div>
                
            </div>
        </div>
    </div>
</div>

@php
    $user = Auth::user();
@endphp

<script>
    function handlePilihPaket() {
        const isLoggedIn = @json($user !== null);

        if (isLoggedIn) {
            window.location.href = "{{ route('filament.u.auth.login') }}";
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Maaf, Anda belum memiliki akun. Silakan register terlebih dahulu.',
                confirmButtonText: 'Oke',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('filament.u.auth.register') }}";
                }
            });
        }
    }
</script>

<!-- Tambahkan SweetAlert2 jika belum -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
