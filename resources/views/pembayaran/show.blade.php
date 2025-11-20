<head>
    <title>Alkhabi Laundry - Detail Pembayaran</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Detail Tagihan Anda</h2>
                <p class="mt-2 text-md text-gray-500">Silakan periksa detail pesanan Anda sebelum melanjutkan.</p>
            </div>

            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-200">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="flex justify-between items-center pb-4 border-b">
                        <h3 class="text-lg font-bold text-pink-600">Pesanan #{{ $pesanan->id }}</h3>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800 capitalize">
                            {{ str_replace('_', ' ', $pesanan->status) }}
                        </span>
                    </div>

                    <div class="mt-6 space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Layanan</span>
                            <span class="font-medium capitalize">{{ $pesanan->jenis_layanan }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Paket</span>
                            <span class="font-medium capitalize">{{ $pesanan->paket }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Berat Cucian / Item</span>
                            <span class="font-medium">{{ $pesanan->berat ?? '0.00' }} kg / item</span>
                        </div>
                        <div class="pt-4 mt-4 border-t flex justify-between items-baseline">
                            <span class="text-lg font-semibold text-gray-800">Total Tagihan</span>
                            <span class="text-2xl font-bold text-pink-600">
                                Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <p class="text-xs text-gray-500 mb-4">
                            Dengan menekan tombol di bawah, Anda akan diarahkan ke halaman pembayaran aman.
                        </p>
                        <button id="pay-button" class="w-full inline-flex items-center justify-center px-8 py-4 bg-pink-500 border border-transparent rounded-lg font-semibold text-lg text-white hover:bg-pink-700 transition shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H7a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('riwayat.index') }}" class="text-sm font-medium text-gray-600 hover:text-pink-600 transition">
                    &larr; Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>

    <!-- Modal QRIS -->
    <div id="qris-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="modal-content" class="bg-white rounded-2xl shadow-xl w-full max-w-xs p-6 text-center transform transition-all scale-95 opacity-0">
            <h3 class="text-xl font-bold text-gray-800">Pindai untuk Membayar</h3>
            <p class="text-sm text-gray-500 mt-2">Gunakan aplikasi Bank atau E-Wallet favorit Anda.</p>

            <div class="my-4">
                <img src="{{ asset('img/qris-alkhabi.png') }}" alt="QRIS Alkhabi Laundry" class="w-56 mx-auto rounded-lg border-4 border-pink-200 p-1">
            </div>

            <p class="text-sm font-bold">
                Total: <span class="text-pink-600">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</span>
            </p>

            <div class="mt-6 space-y-3">
                <form action="{{ route('pembayaran.konfirmasi', $pesanan) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-pink-500 border border-transparent rounded-lg font-semibold text-white hover:bg-pink-600">
                        Saya Sudah Bayar
                    </button>
                </form>
                <button id="cancel-button" type="button" class="w-full text-sm font-medium text-gray-600 hover:text-black py-2">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const payButton = document.getElementById('pay-button');
            const qrisModal = document.getElementById('qris-modal');
            const modalContent = document.getElementById('modal-content');
            const cancelButton = document.getElementById('cancel-button');

            if (payButton && qrisModal && cancelButton && modalContent) {
                const openModal = () => {
                    qrisModal.classList.remove('hidden');
                    setTimeout(() => {
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('scale-100', 'opacity-100');
                    }, 10);
                };

                const closeModal = () => {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        qrisModal.classList.add('hidden');
                    }, 300);
                };

                payButton.addEventListener('click', openModal);
                cancelButton.addEventListener('click', closeModal);

                qrisModal.addEventListener('click', function (event) {
                    if (event.target === qrisModal) {
                        closeModal();
                    }
                });
            }
        });
    </script>
</x-app-layout>
