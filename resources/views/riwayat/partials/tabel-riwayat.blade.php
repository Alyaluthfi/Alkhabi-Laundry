{{--
File: resources/views/riwayat/partials/tabel-riwayat.blade.php
--}}

<div class="hidden md:block overflow-x-auto">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan & Paket</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Tagihan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($pesanan as $p)
                <tr class="hover:bg-pink-50/50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900">{{ $p->nama_pelanggan }}</div>
                        <div class="text-sm text-gray-500">{{ $p->no_hp }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                         <div class="text-sm text-gray-900 capitalize">{{ $p->jenis_layanan }}</div>
                         <div class="text-sm text-gray-500 capitalize">{{ $p->paket }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($p->total_harga)
                            <span class="text-sm font-bold text-pink-600">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</span>
                        @else
                            <span class="text-xs text-gray-400 italic">Menunggu timbang</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span @class([
                            'px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize',
                            'bg-yellow-100 text-yellow-800' => $p->status == 'Menunggu Konfirmasi',
                            'bg-blue-100 text-blue-800' => $p->status == 'Menunggu Pembayaran',
                            'bg-purple-100 text-purple-800' => $p->status == 'Diproses',
                            'bg-green-100 text-green-800' => $p->status == 'Lunas' || $p->status == 'Selesai',
                            'bg-red-100 text-red-800' => $p->status == 'Dibatalkan',
                        ])>
                            {{ str_replace('_', ' ', $p->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        {{-- PERUBAHAN LOGIKA TOMBOL --}}
                        @if($p->status == 'Menunggu Pembayaran')
                            <a href="{{ route('pembayaran.show', $p) }}" class="inline-block bg-pink-500 text-white px-3 py-1.5 rounded text-xs font-bold hover:bg-pink-600 transition shadow-sm">Bayar</a>
                        @else
                            <a href="{{ route('riwayat.show', $p) }}" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>