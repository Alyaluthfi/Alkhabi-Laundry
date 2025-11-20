<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Pesanan & Riwayat ---
    Route::get('/riwayat', [PesanController::class, 'riwayat'])->name('riwayat.index');
    Route::get('/riwayat/{pesan}', [PesanController::class, 'show'])->name('riwayat.show');

    // Grup Rute untuk proses pembuatan pesanan (STEP-BY-STEP)
    Route::get('/pesan/create/langkah-1', [PesanController::class, 'createStep1'])->name('pesan.create.step1');
    Route::post('/pesan/create/langkah-1', [PesanController::class, 'postStep1'])->name('pesan.store.step1');
    Route::get('/pesan/create/langkah-2', [PesanController::class, 'createStep2'])->name('pesan.create.step2');
    Route::post('/pesan/create/langkah-2', [PesanController::class, 'postStep2'])->name('pesan.store.step2');
    Route::get('/pesan/create/langkah-3', [PesanController::class, 'createStep3'])->name('pesan.create.step3');
    Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');

    // --- PEMBAYARAN ---
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/{pesan}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::post('/pembayaran/{pesan}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');


    // --- Feedback ---
    // Update: Menambahkan '/create/{pesan?}' agar sesuai dengan controller yang baru
    Route::get('/feedback/create/{pesan?}', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    
});

require __DIR__.'/auth.php';