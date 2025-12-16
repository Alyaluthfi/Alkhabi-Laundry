<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function riwayat()
    {
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
     * LANGKAH 1: Validasi Data Diri & Metode Pengiriman
     */
    public function postStep1(Request $request)
    {
        // PERUBAHAN: Validasi dinamis untuk alamat
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'metode_pengiriman' => 'required|string|in:antar_jemput,mandiri', // Wajib pilih metode
            // Alamat wajib diisi HANYA JIKA metode adalah antar_jemput
            'alamat' => 'required_if:metode_pengiriman,antar_jemput|nullable|string', 
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

        $finalData['user_id'] = Auth::id(); 
        $finalData['status'] = 'Menunggu Konfirmasi';

        // Pastikan jika metode mandiri, alamat diisi null (agar aman di DB)
        if (isset($finalData['metode_pengiriman']) && $finalData['metode_pengiriman'] == 'mandiri') {
            $finalData['alamat'] = null;
        }

        Pesan::create($finalData);

        $request->session()->forget('pesan');

        return redirect()->route('riwayat.index')->with('success', 'Pesanan Anda berhasil dibuat! Kami akan segera mengkonfirmasi.');
    }
}