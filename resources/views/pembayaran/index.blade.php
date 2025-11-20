<head>
    <title>Alkhabi Laundry - Pembayaran</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="px-4 sm:px-0 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Tagihan Anda</h2>
                <p class="mt-2 text-md text-gray-500">Berikut adalah daftar pesanan yang menunggu pembayaran.</p>
            </div>

            @if($tagihans->isEmpty())
                <div class="bg-white/80 backdrop-blur-sm text-center p-12 rounded-2xl shadow-lg border border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-800">Tidak Ada Tagihan!</h3>
                    <p class="mt-1 text-sm text-gray-500">Semua pesanan Anda sudah dibayar. Terima kasih!</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($tagihans as $tagihan)
                        <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-2xl border border-gray-200 p-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="font-semibold text-pink-600">Pesanan #{{ $tagihan->id }}</span>
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 capitalize">
                                        {{ str_replace('_', ' ', $tagihan->status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Tanggal: {{ $tagihan->created_at->format('d M Y') }}</p>
                                <p class="text-lg font-bold text-gray-800 mt-2">Rp {{ number_format($tagihan->total_harga, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('pembayaran.show', $tagihan) }}" class="inline-flex items-center justify-center px-6 py-2 bg-pink-500 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-pink-600 transition w-full sm:w-auto">
                                Bayar Sekarang
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
