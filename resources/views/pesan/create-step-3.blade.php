<head>
    <title>Alkhabi Laundry - Pesan Step 3</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Hampir Selesai!</h2>
                <p class="mt-2 text-md text-gray-500">Langkah 3: Pilih Paket & Konfirmasi</p>
            </div>

            @include('pesan.partials.progress-bar', ['step' => 3])

            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-200 mt-8">
                <div class="p-6 md:p-8 text-gray-900">
                     <div class="mb-8 text-center">
                        <h3 class="text-2xl font-bold text-pink-600">Satu Langkah Lagi!</h3>
                        <p class="mt-1 text-sm text-gray-500">Pilih paket dan konfirmasi pesanan Anda.</p>
                    </div>

                    <div class="mb-8 p-6 bg-pink-50 border-l-4 border-pink-400 rounded-r-lg space-y-3">
                        <h4 class="font-bold text-lg text-pink-800">Ringkasan Pesanan Anda</h4>
                        <div class="text-sm text-gray-700 space-y-1">
                            <p><strong>Nama:</strong> {{ $pesanan['nama_pelanggan'] }}</p>
                            <p><strong>Alamat:</strong> {{ $pesanan['alamat'] }}</p>
                            <p><strong>Layanan:</strong> <span class="capitalize font-semibold">{{ $pesanan['jenis_layanan'] }}</span></p>
                        </div>
                    </div>

                    <form action="{{ route('pesan.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="paket" class="block mb-2 text-sm font-medium text-gray-700">Pilih Paket Kecepatan</label>
                            <select id="paket" name="paket" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" required>
                                <option value="" disabled selected>-- Pilih salah satu paket --</option>
                                <option value="reguler">Reguler (2 Hari)</option>
                                <option value="ekspress">Express (1 Hari / 24 Jam)</option>
                                <option value="kilat">Kilat (Setengah Hari / 12 Jam)</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                            <a href="{{ route('pesan.create.step2') }}" class="text-sm font-medium text-gray-600 hover:text-pink-600 transition">
                                &larr; Kembali
                            </a>
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-green-500 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-600 active:bg-green-700 transition shadow-lg hover:shadow-green-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                Selesaikan Pesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>