<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            if (Schema::hasColumn('feedbacks', 'pesanan_id')) {
                $table->foreignId('pesanan_id')->nullable()->change();
            } else {
                $table->foreignId('pesanan_id')->nullable()->constrained('pesans')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
        });
    }
};