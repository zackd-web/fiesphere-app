<?php

namespace App\Filament\Resources\Mentors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MentorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Mentor')
                    ->required(),
                TextInput::make('specialization')
                    ->label('Spesialisasi')
                    ->required(),
                TextInput::make('expertise_badge')
                    ->label('Lencana Keahlian') 
                    ->required(),
                TextInput::make('order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('photo_path')
                    ->visibility('public')
                    ->directory('mentors')
                    ->label('Foto Mentor')
                    ->image()
                    ->required(),
                Repeater::make('tags')
                    ->simple(
                        TextInput::make('tag') // Ini bakal nyimpen array of strings ["tag1", "tag2"]
                            ->placeholder('contoh: TESOL Certified')
                            ->required(),
                    )   
                    ->label('Tags Pengalaman')
                    ->addActionLabel('Tambah Tag') // Tulisan di tombol tambah
                    ->reorderable(false) // Biar nggak bisa di-drag, sama kayak Breeze
                    ->helperText('Contoh: Ex-Tutor Pare, TESOL Certified')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->required(),
            ]);
    }
}
