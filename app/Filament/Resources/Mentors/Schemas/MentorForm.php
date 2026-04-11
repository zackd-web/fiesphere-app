<?php

namespace App\Filament\Resources\Mentors\Schemas;

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
                    ->required(),
                TextInput::make('specialization')
                    ->required(),
                TextInput::make('expertise_badge')
                    ->required(),
                TextInput::make('photo_path')
                    ->required(),
                TextInput::make('tags')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
