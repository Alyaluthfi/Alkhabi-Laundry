<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

     // --- KONFIGURASI LABEL (Tambahkan Ini) ---
    protected static ?string $modelLabel = 'Ulasan Pelanggaan'; 
    protected static ?string $pluralModelLabel = 'Ulasan Pelanggan'; 

    protected static ?string $navigationIcon = 'heroicon-o-star'; // Ikon Bintang
    protected static ?string $navigationLabel = 'Ulasan Pelanggan';
    protected static ?string $navigationGroup = 'Manajemen Data';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Masukan')
                    ->schema([
                        TextInput::make('nama_pelanggan')
                            ->label('Nama Pengirim')
                            ->readOnly(),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('puas_laundry')
                                    ->label('Rating Laundry (1-5)')
                                    ->readOnly()
                                    ->suffix('Bintang'),
                                TextInput::make('puas_harga')
                                    ->label('Rating Harga (1-5)')
                                    ->readOnly()
                                    ->suffix('Bintang'),
                            ]),

                        Textarea::make('kritik_saran')
                            ->label('Isi Pesan')
                            ->rows(4)
                            ->readOnly(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pelanggan')
                    ->weight('bold')
                    ->searchable(),
                
                // Rating dengan Warna
                TextColumn::make('puas_laundry')
                    ->label('Layanan')
                    ->badge()
                    ->color(fn ($state) => $state >= 4 ? 'success' : ($state >= 3 ? 'warning' : 'danger'))
                    ->formatStateUsing(fn ($state) => $state . ' ★'),

                TextColumn::make('puas_harga')
                    ->label('Harga')
                    ->badge()
                    ->color(fn ($state) => $state >= 4 ? 'success' : ($state >= 3 ? 'warning' : 'danger'))
                    ->formatStateUsing(fn ($state) => $state . ' ★'),

                TextColumn::make('kritik_saran')
                    ->label('Pesan')
                    ->limit(40)
                    ->tooltip(fn (Feedback $record): string => $record->kritik_saran ?? ''),

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->label('Tanggal'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeedback::route('/'),
        ];
    }
}