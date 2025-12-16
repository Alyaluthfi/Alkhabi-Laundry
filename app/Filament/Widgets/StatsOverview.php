<?php

namespace App\Filament\Widgets;

use App\Models\Pesan;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Mengatur posisi widget (paling atas)
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            // KARTU 1: TOTAL PENDAPATAN (Uang Masuk)
            Stat::make('Total Pendapatan', 'Rp ' . number_format(Pesan::whereIn('status', ['Lunas', 'Selesai'])->sum('total_harga'), 0, ',', '.'))
                ->description('Pemasukan bersih (Lunas/Selesai)')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success') // Hijau (Uang)
                ->chart([7, 2, 10, 3, 15, 4, 17]), // Grafik mini (Sparkline)

            // KARTU 2: PESANAN BARU (Butuh Tindakan)
            Stat::make('Pesanan Baru', Pesan::where('status', 'Menunggu Konfirmasi')->count())
                ->description('Menunggu konfirmasi admin')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('danger') // Merah (Penting)
                ->chart([10, 5, 2, 20, 1, 5, 8]),

            // KARTU 3: TOTAL PELANGGAN
            Stat::make('Total Pelanggan', User::where('role', 'konsumen')->count())
                ->description('Pelanggan terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'), // Pink (Sesuai Brand Alkhabi)
        ];
    }
}