<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function riwayat()
    {
        // PERUBAHAN: 'Lunas' sekarang termasuk dalam pesanan aktif karena belum selesai (diambil).
        $pesananAktif = Pesan::where('user_id', Auth::id())
                              ->whereIn('status', ['Menunggu Konfirmasi', 'Menunggu Pembayaran', 'Diproses', 'Lunas'])
                              ->latest()
                              ->get();

        $riwayatSelesai = Pesan::where('user_id', Auth::id())
                               ->whereIn('status', ['Selesai', 'Dibatalkan'])
                               ->latest()
                               ->get();

        return view('riwayat.index', compact('pesananAktif', 'riwayatSelesai'));
    }

    public function show(Pesan $pesan)
    {
        if ($pesan->user_id !== Auth::id()) {
            abort(403, 'AKSES TIDAK DIIZINKAN');
        }

        return view('riwayat.show', compact('pesan'));
    }

    /**
     * LANGKAH 1: Menampilkan form data diri pelanggan.
     */
    public function createStep1(Request $request)
    {
        $pesanan = $request->session()->get('pesan');
        return view('pesan.create-step-1', compact('pesanan'));
    }

    /**
     * LANGKAH 1: Memvalidasi dan menyimpan data diri ke session.
     */
    public function postStep1(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $request->session()->put('pesan', $validatedData);

        return redirect()->route('pesan.create.step2');
    }

    /**
     * LANGKAH 2: Menampilkan form pilihan layanan.
     */
    public function createStep2(Request $request)
    {
        $pesanan = $request->session()->get('pesan');
        return view('pesan.create-step-2', compact('pesanan'));
    }

    /**
     * LANGKAH 2: Memvalidasi dan menyimpan layanan ke session.
     */
    public function postStep2(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_layanan' => 'required|string|in:kiloan,satuan,dryclean',
        ]);

        $pesanan = $request->session()->get('pesan');
        $pesanan = array_merge($pesanan, $validatedData);
        $request->session()->put('pesan', $pesanan);

        return redirect()->route('pesan.create.step3');
    }

    /**
     * LANGKAH 3: Menampilkan form pilihan paket dan ringkasan.
     */
    public function createStep3(Request $request)
    {
        $pesanan = $request->session()->get('pesan');
        return view('pesan.create-step-3', compact('pesanan'));
    }

    /**
     * FINAL: Menyimpan semua data dari session ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paket' => 'required|string|in:reguler,ekspress,kilat',
        ]);

        $pesananData = $request->session()->get('pesan');
        $finalData = array_merge($pesananData, $validatedData);

        // --- PENYESUAIAN PENTING ---
        $finalData['user_id'] = Auth::id(); // Tambahkan ID user yang membuat pesanan
        $finalData['status'] = 'Menunggu Konfirmasi'; // Atur status awal

        // Gunakan model 'Pesan' untuk membuat data baru
        Pesan::create($finalData);

        $request->session()->forget('pesan');

        return redirect()->route('riwayat.index')->with('success', 'Pesanan Anda berhasil dibuat! Kami akan segera mengkonfirmasi.');
    }
}
