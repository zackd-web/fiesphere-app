<?php

namespace App\Filament\Resources\Programs\Schemas;

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
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('duration')
                    ->required()
                    ->default('pertemuan'),
                TextInput::make('features')
                    ->required(),
                TextInput::make('button_text')
                    ->required()
                    ->default('Pilih Paket'),
                TextInput::make('button_link')
                    ->required()
                    ->default('#register'),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
