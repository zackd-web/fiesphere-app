<?php

namespace App\Filament\Resources\Mentors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MentorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('specialization')
                    ->label('Spesialisasi')
                    ->searchable(),
                TextColumn::make('expertise_badge')
                    ->label('Lencana Keahlian')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->label('Keaktifan')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime('d F Y, H:i')
                    ->label('Dibuat Pada')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d F Y, H:i')
                    ->label('Diperbarui Pada')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
