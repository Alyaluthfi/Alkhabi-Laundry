<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

// require __DIR__.'/auth.php';
