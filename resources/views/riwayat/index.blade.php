<head>
    <title>Alkhabi Laundry - Riwayat</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="px-4 sm:px-0 mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Halaman Riwayat</h2>
                    <p class="mt-1 text-md text-gray-500">Lacak pesanan aktif dan lihat riwayat transaksi Anda.</p>
                </div>
                <a href="{{ route('pesan.create.step1') }}" class="hidden sm:inline-flex items-center px-5 py-2.5 bg-pink-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600">
                    + Buat Pesanan Baru
                </a>
            </div>
            
            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <p class="font-bold">Informasi</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif


            <div class="mb-12">
                <h3 class="text-xl font-semibold text-pink-700 mb-4 px-4 sm:px-0">Pesanan Aktif Anda</h3>
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-2xl border border-gray-200 p-4">
                    @if($pesananAktif->isEmpty())
                        <p class="text-center text-gray-500 py-8">Tidak ada pesanan yang sedang aktif.</p>
                    @else
                        {{-- Tampilan tabel untuk pesanan aktif --}}
                        @include('riwayat.partials.tabel-riwayat', ['pesanan' => $pesananAktif])
                    @endif
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 px-4 sm:px-0">Riwayat Terdahulu</h3>
                 <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-2xl border border-gray-200 p-4">
                    @if($riwayatSelesai->isEmpty())
                        <p class="text-center text-gray-500 py-8">Belum ada riwayat pesanan yang selesai.</p>
                    @else
                        @include('riwayat.partials.tabel-riwayat', ['pesanan' => $riwayatSelesai])
                    @endif
                </div>
            </div>

        </div>
    </div>


    @if (session('showFeedbackModal'))
        <div id="feedback-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 transition-opacity duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8 text-center transform transition-all scale-95 opacity-0" id="feedback-modal-content">
                
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-pink-100">
                    <svg class="h-8 w-8 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mt-5">Terima Kasih!</h3>
                <p class="text-md text-gray-600 mt-2 leading-relaxed">
                    Pembayaran Anda telah kami terima. Kepuasan Anda adalah prioritas kami. <br>
                    Satu masukan kecil dari Anda akan sangat membantu Alkhabi untuk terus berkembang.
                </p>
                
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('feedback.create') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-pink-500 border border-transparent rounded-lg font-semibold text-white hover:bg-pink-600 transition">
                        Oke, Beri Feedback
                    </a>
                    <button id="close-feedback-modal" type="button" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gray-200 border border-transparent rounded-lg font-semibold text-gray-700 hover:bg-gray-300 transition">
                        Mungkin Nanti
                    </button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const feedbackModal = document.getElementById('feedback-modal');
                const modalContent = document.getElementById('feedback-modal-content');
                const closeButton = document.getElementById('close-feedback-modal');

                if (feedbackModal && modalContent && closeButton) {
                    const openModal = () => {
                        feedbackModal.classList.remove('hidden');
                        setTimeout(() => {
                            modalContent.classList.remove('scale-95', 'opacity-0');
                            modalContent.classList.add('scale-100', 'opacity-100');
                        }, 10);
                    };

                    const closeModal = () => {
                        modalContent.classList.add('scale-95', 'opacity-0');
                        setTimeout(() => {
                            feedbackModal.classList.add('hidden');
                        }, 300);
                    };
                    
                    openModal(); 

                    closeButton.addEventListener('click', closeModal);

                    feedbackModal.addEventListener('click', function(event) {
                        if (event.target === feedbackModal) {
                            closeModal();
                        }
                    });
                }
            });
        </script>
    @endif
</x-app-layout>
