<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('time_range')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
