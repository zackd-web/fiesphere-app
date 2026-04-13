<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pricing_id')
                    ->required()
                    ->numeric(),
                TextInput::make('schedule_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('nickname')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('whatsapp')
                    ->required(),
                Select::make('gender')
                    ->options(['L' => 'L', 'P' => 'P'])
                    ->required(),
                DatePicker::make('birth_date')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('school_origin'),
                TextInput::make('education')
                    ->required(),
                Select::make('class_type')
                    ->options(['online' => 'Online', 'offline' => 'Offline'])
                    ->default('offline')
                    ->required(),
                TextInput::make('source')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
            ]);
    }
}
