<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikPesananChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Pesanan Bulanan';
    
    // Urutan ke-2 (Di bawah StatsOverview)
    protected static ?int $sort = 2; 
    
    // Biar grafiknya lebar memenuhi layar
    protected int | string | array $columnSpan = 'full'; 

    protected function getData(): array
    {
        // Data Dummy untuk visualisasi (Nanti bisa diganti query real database)
        // Biar dashboardnya terlihat "hidup" dulu.
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pesanan',
                    'data' => [10, 15, 8, 25, 20, 35, 45, 30, 50, 60, 75, 90],
                    'backgroundColor' => '#ec4899', // Warna Pink Alkhabi (Background)
                    'borderColor' => '#be185d',     // Warna Pink Tua (Garis)
                    'fill' => true,                 // Area bawah grafik diwarnai
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis Grafik: Garis (Line)
    }
}
