<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanResource\Pages;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\Action;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    // --- KONFIGURASI LABEL (Tambahkan Ini) ---
    protected static ?string $modelLabel = 'Pesanan'; 
    protected static ?string $pluralModelLabel = 'Daftar Pesanan'; 

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Pesanan Masuk';
    protected static ?string $navigationGroup = 'Operasional Laundry';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'Menunggu Konfirmasi')->count();
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'Menunggu Konfirmasi')->count() > 0 ? 'danger' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Pelanggan')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('nama_pelanggan')->readOnly()->label('Nama'),
                        TextInput::make('no_hp')->readOnly()->label('WhatsApp'),
                        Textarea::make('alamat')->columnSpanFull()->readOnly(),
                        
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('jenis_layanan')->readOnly()->prefixIcon('heroicon-m-tag'),
                                TextInput::make('paket')->readOnly()->prefixIcon('heroicon-m-clock'),
                            ]),
                    ])->columnSpan(1),

                Section::make('Proses Laundry')
                    ->icon('heroicon-o-scale')
                    ->schema([
                        TextInput::make('berat')->label('Berat Fisik')->numeric()->required()->suffix('Kg'),
                        TextInput::make('total_harga')->label('Total Tagihan')->numeric()->required()->prefix('Rp'),
                        Select::make('status')
                            ->options([
                                'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                                'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                                'Diproses' => 'Sedang Diproses (Cuci/Setrika)',
                                'Lunas' => 'Lunas (Siap Diambil)',
                                'Selesai' => 'Selesai (Sudah Diambil)',
                                'Dibatalkan' => 'Dibatalkan',
                            ])->required()->native(false),
                    ])->columnSpan(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->weight('bold')->color('primary')->prefix('#ORDER-'),
                TextColumn::make('nama_pelanggan')->searchable()->description(fn (Pesan $record) => $record->jenis_layanan . ' - ' . $record->paket),
                TextColumn::make('status')->badge()->sortable()
                    ->color(fn ($state) => match($state) {
                        'Menunggu Konfirmasi' => 'warning',
                        'Menunggu Pembayaran' => 'info',
                        'Diproses' => 'primary',
                        'Lunas', 'Selesai' => 'success',
                        'Dibatalkan' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('total_harga')->money('IDR')->sortable()->weight('bold'),
                TextColumn::make('created_at')->dateTime('d M Y, H:i')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                
                // --- PERBAIKAN EMOTE WHATSAPP ---
                Action::make('notify')
                    ->label('WA')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->color('success')
                    ->iconButton()
                    ->tooltip('Kirim Update Status ke WA Pelanggan')
                    ->url(fn (Pesan $record) => 
                        'https://wa.me/' . preg_replace('/^0/', '62', $record->no_hp) . '?text=' . 
                        rawurlencode( // PENTING: Gunakan rawurlencode agar emoji aman
                            match($record->status) {
                                'Menunggu Pembayaran' => 
"🔵 *STATUS : Menunggu Pembayaran*

Halo Kak {$record->nama_pelanggan}! 👋😄
Laundry Kakak dengan ID *#{$record->id}* sudah kami timbang 🧺✨

⚖ Berat : *{$record->berat} Kg*
💰 Tagihan : *Rp " . number_format($record->total_harga, 0, ',', '.') . "*

Silakan lakukan pembayaran di menu Riwayat ya Kak, biar cuciannya langsung kami proses mandi busa 🫧. Ditunggu yaa 🤍

Salam Wangi,
*Alkhabi Laundry* 💛",
                                
                                'Diproses' => 
"🟡 *STATUS : Sedang Diproses*

Halo Kak {$record->nama_pelanggan}! 🧺🫧
Pesanan *#{$record->id}* sedang kami cuci dan rawat dengan penuh cinta agar wangi maksimal 🌿✨

Tunggu update berikutnya saat sudah selesai ya 💙

- Alkhabi Laundry",
                                
                                'Lunas' => 
"🟢 *STATUS : Pembayaran Diterima*

Yeay Kak {$record->nama_pelanggan}! 🎉✨
Pembayaran untuk Laundry *#{$record->id}* sudah kami terima. Cucian Kakak sekarang sedang dalam antrian prioritas kami 🚀.

Terima kasih sudah percaya sama Alkhabi Laundry! 💛",

                                'Selesai' => 
"🟢 *STATUS : Laundry Selesai & Wangi!*

Hore! 🥳 Laundry Kak {$record->nama_pelanggan} dengan ID *#{$record->id}* sudah *SELESAI*, wangi, dan rapi! ✨👕

Silakan diambil atau tunggu kurir kami meluncur 🛵💨.

Kalau puas dengan hasilnya, boleh dong kasih bintang 5 di aplikasi ⭐⭐⭐⭐⭐. Terima kasih banyak! 🥰

- Alkhabi Laundry",
                                
                                'Dibatalkan' => 
"🔴 *STATUS : Pesanan Dibatalkan*

Halo Kak {$record->nama_pelanggan}. Mohon maaf, pesanan *#{$record->id}* telah dibatalkan 😢.

Jika ada kesalahan atau ingin order ulang, kami siap membantu kapan saja 🤍.

- Alkhabi Laundry",
                                
                                default => "Halo Kak {$record->nama_pelanggan}, update untuk Pesanan #{$record->id}: Status sekarang *{$record->status}*. Terima kasih! - Alkhabi Laundry"
                            }
                        )
                    , true)
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesans::route('/'),
            'create' => Pages\CreatePesan::route('/create'),
            'edit' => Pages\EditPesan::route('/{record}/edit'),
        ];
    }    
}