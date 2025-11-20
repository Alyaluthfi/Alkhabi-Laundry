<head>
    <title>Alkhabi Laundry - Pesan Step 1</title>
</head>
<x-app-layout id="pesan">
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Mulai Pesanan Anda</h2>
                <p class="mt-2 text-md text-gray-500">Langkah 1: Pengisian Data Diri</p>
            </div>

            @include('pesan.partials.progress-bar', ['step' => 1])

            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-200 mt-8">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="mb-8 text-center">
                        <h3 class="text-2xl font-bold text-pink-600">Mari kita mulai!</h3>
                        <p class="mt-1 text-sm text-gray-500">Silakan isi detail data diri Anda.</p>
                    </div>
                    
                    <form action="{{ route('pesan.store.step1') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-700">Nama Pelanggan</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ $pesanan['nama_pelanggan'] ?? '' }}" class="block w-full p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-700">No. Handphone</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ $pesanan['no_hp'] ?? '' }}" class="block w-full p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Contoh: 08123456789" required>
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" rows="4" class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" placeholder="Masukkan alamat lengkap untuk penjemputan..." required>{{ $pesanan['alamat'] ?? '' }}</textarea>
                        </div>
                        <div class="flex justify-end pt-6 border-t border-gray-200">
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