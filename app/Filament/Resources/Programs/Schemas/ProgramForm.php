<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Program')
                    ->required(),
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                 Toggle::make('is_featured')
                    ->label('Rekomendasi (warna biru)')
                    ->required(),
                TextInput::make('duration')
                    ->label('Durasi')
                    ->required()
                    ->default('pertemuan'),
                Repeater::make('features') // Sesuaikan dengan nama kolom di DB lo
                    ->simple(
                        TextInput::make('feature')
                            ->placeholder('Contoh: English Area')
                            ->required(),
                    )
                    ->label('Poin Fitur (Edit/Tambah)')
                    ->addActionLabel('Tambah Poin Lagi')
                    ->required(),
                Toggle::make('is_active')
                ->label('Aktifkan Program')
                    ->required(),
            ]);
    }
}
