<head>
    <title>Alkhabi Laundry - Detail Riwayat</title>
</head>

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-pink-50 via-white to-pink-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="px-4 sm:px-0 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Detail Pesanan #{{ $pesan->id }}</h2>
                <p class="mt-2 text-md text-gray-500">Lacak perjalanan cucian Anda dari awal hingga bersih kembali.</p>
            </div>

            @include('riwayat.partials.timeline-status', ['status' => $pesan->status])

            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    {{-- Card Rincian Pesanan --}}
                    <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg rounded-2xl border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-pink-700">Rincian Pesanan</h3>
                            <div class="mt-4 space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Jenis Layanan:</span>
                                    <span class="font-medium text-gray-800 capitalize">{{ $pesan->jenis_layanan }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Paket Kecepatan:</span>
                                    <span class="font-medium text-gray-800 capitalize">{{ $pesan->paket }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Estimasi Berat/item:</span>
                                    <span class="font-medium text-gray-800">{{ $pesan->berat ?? 'Belum ditimbang' }} {{ $pesan->berat ? 'kg/item' : '' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg rounded-2xl border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-pink-700">Rincian Biaya</h3>
                            <div class="mt-4 space-y-3 text-sm">
                                <div class="flex justify-between items-baseline pt-4 border-t">
                                    <span class="text-base font-semibold text-gray-800">Total Bayar:</span>
                                    <span class="text-xl font-bold text-pink-600">
                                        {{ $pesan->total_harga ? 'Rp ' . number_format($pesan->total_harga, 0, ',', '.') : 'Menunggu Konfirmasi Admin' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg rounded-2xl border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-pink-700 mb-4">Info Pelanggan</h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <dt class="text-gray-500">Nama</dt>
                                <dd class="font-medium text-gray-800">{{ $pesan->nama_pelanggan }}</dd>
                            </div>
                            <div>
                                <dt class="text-gray-500">No. Handphone</dt>
                                <dd class="font-medium text-gray-800">{{ $pesan->no_hp }}</dd>
                            </div>
                            <div>
                                <dt class="text-gray-500">Alamat Penjemputan</dt>
                                <dd class="font-medium text-gray-800">{{ $pesan->alamat }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('riwayat.index') }}" class="text-sm font-medium text-gray-600 hover:text-pink-600 transition">&larr; Kembali ke Halaman Riwayat</a>
            </div>
        </div>
    </div>
</x-app-layout>
