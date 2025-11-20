<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pesans', function (Blueprint $table) {
            
            // HAPUS SEMUA BARIS INI KARENA SUDAH DIBUAT DI MIGRASI LAIN
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            // $table->string('status')->after('user_id')->default('Menunggu Konfirmasi');
            // $table->decimal('berat', 8, 2)->after('status')->nullable();
            // $table->unsignedInteger('total_harga')->after('berat')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'status', 'berat', 'total_harga']);
        });
    }
};