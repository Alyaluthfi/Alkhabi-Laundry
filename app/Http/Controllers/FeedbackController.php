<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth; // Pastikan import ini ada jika menggunakan Auth

class FeedbackController extends Controller
{
    public function create(Pesan $pesan = null)
    {
        return view('feedback.create', ['pesan' => $pesan]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'nullable|exists:pesans,id',
            'nama_pelanggan' => 'required|string|max:255',
            'puas_laundry' => 'required|integer|min:1|max:5',
            'puas_harga' => 'required|integer|min:1|max:5',
            'kritik_saran' => 'nullable|string',
        ]);

        Feedback::create($request->all());

        return redirect()->back()->with('success', 'Terima kasih! Masukan Anda sangat berarti bagi kami.');
    }
}