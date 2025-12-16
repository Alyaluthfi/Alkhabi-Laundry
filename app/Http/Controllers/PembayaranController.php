<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar semua tagihan yang perlu dibayar.
     */
    public function index()
    {
        $tagihans = Pesan::where('user_id', Auth::id())
                         ->where('status', 'Menunggu Pembayaran')
                         ->latest()
                         ->get();

        return view('pembayaran.index', compact('tagihans'));
    }

    /**
     * Menampilkan halaman detail pembayaran untuk sebuah pesanan.
     */
    public function show(Pesan $pesan)
    {
        if ($pesan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Validasi: Hanya pesanan status 'Menunggu Pembayaran' yang bisa diakses di sini
        if ($pesan->status !== 'Menunggu Pembayaran') {
             return redirect()->route('riwayat.index')->with('error', 'Tagihan tidak tersedia.');
        }

        return view('pembayaran.show', ['pesanan' => $pesan]);
    }

    /**
     * Mengonfirmasi pembayaran (User Klik "Saya Sudah Bayar")
     */
    public function konfirmasi(Request $request, Pesan $pesan)
    {
        if ($pesan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // --- PERBAIKAN LOGIKA DISINI ---
        
        // 1. Ubah status jadi 'Menunggu Konfirmasi' agar Admin mendapat notifikasi/tanda
        // Jangan langsung 'Lunas', karena admin harus cek mutasi bank dulu.
        $pesan->status = 'Menunggu Konfirmasi'; 
        $pesan->save();
        
        // 2. Buat record pembayaran dengan status 'pending'
        Pembayaran::create([
            'pesanan_id' => $pesan->id,
            'jumlah_bayar' => $pesan->total_harga,
            'metode_pembayaran' => 'QRIS (Konfirmasi Manual)',
            'status_pembayaran' => 'pending', // Pending = Menunggu Admin Cek
        ]);

        // Redirect ke riwayat dengan trigger modal feedback/notifikasi WA
        return redirect()->route('riwayat.index')->with('showFeedbackModal', true);
    }
}