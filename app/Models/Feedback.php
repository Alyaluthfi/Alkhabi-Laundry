<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory; 

    protected $table = 'feedbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pesanan_id', // <-- WAJIB DITAMBAHKAN DISINI
        'nama_pelanggan',
        'puas_laundry',
        'puas_harga',
        'kritik_saran',
    ];

   
    public function pesan()
    {
        return $this->belongsTo(Pesan::class);
    }
}