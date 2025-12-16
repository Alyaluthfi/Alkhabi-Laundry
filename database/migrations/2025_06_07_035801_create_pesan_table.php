<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            
            // PERUBAHAN 1: Tambah kolom metode_pengiriman
            // Values: 'antar_jemput' atau 'mandiri'
            $table->string('metode_pengiriman'); 

            // PERUBAHAN 2: Alamat dibuat nullable (boleh kosong jika pilih Mandiri/Drop-off)
            $table->text('alamat')->nullable(); 
            
            $table->string('jenis_layanan')->nullable(); // Nullable karena diisi di step 2
            $table->string('paket')->nullable(); // Nullable karena diisi di step 3
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('status')->default('Menunggu Konfirmasi');
            
            $table->decimal('berat', 8, 2)->nullable();
            $table->unsignedInteger('total_harga')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};