<head>
    <title>Alkhabi Laundry - Pesan Step 2</title>
</head>
<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Pilih Layanan Favoritmu</h2>
                <p class="mt-2 text-md text-gray-500">Langkah 2: Penentuan Jenis Layanan</p>
            </div>

            @include('pesan.partials.progress-bar', ['step' => 2])

            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-200 mt-8">
                <div class="p-6 md:p-8 text-gray-900">
                     <div class="mb-8 text-center">
                        <h3 class="text-2xl font-bold text-pink-600">Pilihan Layanan</h3>
                        <p class="mt-1 text-sm text-gray-500">Sekarang, tentukan jenis layanan yang Anda butuhkan.</p>
                    </div>

                    <form action="{{ route('pesan.store.step2') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label for="kiloan" class="relative text-center flex flex-col justify-center items-center p-6 bg-white border-2 rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                    <input id="kiloan" type="radio" name="jenis_layanan" value="kiloan" class="sr-only" required {{ ($pesanan['jenis_layanan'] ?? '') == 'kiloan' ? 'checked' : '' }}>
                                    <span class="text-md font-semibold text-gray-700">Kiloan</span>
                                </label>
                                <label for="satuan" class="relative text-center flex flex-col justify-center items-center p-6 bg-white border-2 rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H7a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                                    <input id="satuan" type="radio" name="jenis_layanan" value="satuan" class="sr-only" required {{ ($pesanan['jenis_layanan'] ?? '') == 'satuan' ? 'checked' : '' }}>
                                    <span class="text-md font-semibold text-gray-700">Satuan</span>
                                </label>
                                <label for="dryclean" class="relative text-center flex flex-col justify-center items-center p-6 bg-white border-2 rounded-lg cursor-pointer has-[:checked]:bg-pink-50 has-[:checked]:border-pink-500 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                                    <input id="dryclean" type="radio" name="jenis_layanan" value="dryclean" class="sr-only" required {{ ($pesanan['jenis_layanan'] ?? '') == 'dryclean' ? 'checked' : '' }}>
                                    <span class="text-md font-semibold text-gray-700">Dry Clean</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                            <a href="{{ route('pesan.create.step1') }}" class="text-sm font-medium text-gray-600 hover:text-pink-600 transition">
                                &larr; Kembali
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-pink-500 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-pink-600 active:bg-pink-700 transition shadow-lg hover:shadow-pink-200">
                                Selanjutnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>