<head>
    <title>Alkhabi Laundry - Feedback</title>
</head>

<x-app-layout>
    <div class="relative min-h-screen bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('img/bg-feedback.jpg') }}')">
        
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 flex justify-center min-h-screen px-4 pt-28 pb-12 sm:px-6 sm:pt-32 lg:px-8">
            
            <div class="w-full max-w-4xl bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden">
                
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <div class="hidden md:flex flex-col justify-center p-8 lg:p-12 bg-pink-500/10">
                        <div class="text-center">
                            <svg class="w-24 h-24 mx-auto text-pink-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m-3-1l-3-1m3 1v-2.25m-3-1l3-1m-3 1L9 3.25m6 6l-3 1m3-1l-3-1M9 3.25l-3 1m-3-1l3 1m0 0l3 1.636m0-1.636L12 5.25m0 0l3 1.636m0 0l3 1" />
                            </svg>
                            <h2 class="mt-6 text-3xl font-bold text-pink-600">Terima Kasih, Pelanggan Setia!</h2>
                            <p class="mt-4 text-gray-700">Setiap ulasan Anda adalah evaluasi bagi kami untuk terus memberikan yang terbaik.</p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">
                        <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Formulir Ulasan</h3>
                        
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('feedback.store') }}" class="space-y-6">
                            @csrf

                            {{-- PERUBAHAN 1: Hanya tampilkan input hidden jika $pesan ada --}}
                            @if($pesan)
                                <input type="hidden" name="pesanan_id" value="{{ $pesan->id }}">
                            @endif

                            <div>
                                <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-700">Nama Pelanggan</label>
                                {{-- PERUBAHAN 2: Cek apakah $pesan ada sebelum ambil nama user, atau ambil dari Auth user yang login --}}
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan" 
                                       class="block w-full px-4 py-3 bg-gray-50/70 border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition-colors" 
                                       value="{{ $pesan->user->name ?? Auth::user()->name ?? old('nama_pelanggan') }}" required>
                                @error('nama_pelanggan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <span class="block mb-2 text-sm font-medium text-gray-700">Kepuasan Hasil Laundry</span>
                                <div class="flex flex-row-reverse justify-end items-center gap-1">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="puas_laundry" id="laundry_rating_{{ $i }}" value="{{ $i }}" class="peer hidden" required {{ old('puas_laundry') == $i ? 'checked' : '' }}>
                                        <label for="laundry_rating_{{ $i }}" class="text-gray-400 cursor-pointer text-4xl transition-colors peer-hover:text-pink-400 peer-checked:text-pink-500">★</label>
                                    @endfor
                                </div>
                                @error('puas_laundry') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <span class="block mb-2 text-sm font-medium text-gray-700">Kesesuaian Harga</span>
                                <div class="flex flex-row-reverse justify-end items-center gap-1">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="puas_harga" id="harga_rating_{{ $i }}" value="{{ $i }}" class="peer hidden" required {{ old('puas_harga') == $i ? 'checked' : '' }}>
                                        <label for="harga_rating_{{ $i }}" class="text-gray-400 cursor-pointer text-4xl transition-colors peer-hover:text-pink-400 peer-checked:text-pink-500">★</label>
                                    @endfor
                                </div>
                                @error('puas_harga') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="kritik_saran" class="block mb-2 text-sm font-medium text-gray-700">Kritik dan Saran (Opsional)</label>
                                <textarea id="kritik_saran" name="kritik_saran" rows="4" class="block w-full px-4 py-3 bg-gray-50/70 border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition-colors">{{ old('kritik_saran') }}</textarea>
                            </div>

                            <div class="flex justify-end items-center gap-4 pt-4">
                                <a href="{{ route('riwayat.index') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200">Batal</a>
                                <button type="submit" class="px-6 py-3 text-sm font-semibold text-white bg-pink-500 rounded-lg shadow-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
                                    Kirim Ulasan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Ulasan Terkirim!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Siap!',
                    confirmButtonColor: '#EC4899',
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
</x-app-layout>