<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Nilai: 'admin' atau 'user'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- HELPER ROLE SEDERHANA ---

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user' || $this->role === 'konsumen'; // Support kedua istilah
    }

    // --- KEAMANAN FILAMENT ---
    
    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya role 'admin' yang bisa login ke /admin
        return $this->isAdmin();
    }
}