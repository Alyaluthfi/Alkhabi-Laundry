<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesans';

    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'no_hp',
        'metode_pengiriman',
        'alamat',
        'jenis_layanan',
        'paket',
        'status',
        'berat',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'pesanan_id');
    }
}