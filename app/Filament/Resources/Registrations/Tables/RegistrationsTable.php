<?php

namespace App\Filament\Resources\Registrations\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use Filament\Actions\EditAction;

class RegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // 👤 Pendaftar — nama + email digabung dalam satu kolom
                TextColumn::make('name')
                    ->label('Pendaftar')
                    ->description(fn ($record) => $record->email)
                    ->searchable(),

                // 📞 Kontak
                TextColumn::make('whatsapp')
                    ->label('Kontak')
                    ->url(fn ($record) => "https://wa.me/" . preg_replace('/[^0-9]/', '', $record->whatsapp))
                    ->openUrlInNewTab()
                    ->searchable(),

                // 📚 Program & Kelas
                TextColumn::make('pricing.title')
                    ->label('Program & Kelas')
                    ->description(fn ($record) => strtoupper($record->class_type))
                    ->sortable(),

                // 🕐 Jadwal
                TextColumn::make('schedule.time_range')
                    ->label('Jadwal')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                // 🏷️ Status
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'  => 'warning',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                        default    => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d F Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d F Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->poll('30s')
            ->filters([
                //
            ])

            ->recordActions([

                // 👁️ Tombol DETAIL — buka modal infolist
                // 1. Tombol DETAIL — Menggunakan Infolist
                Action::make('detail')
                    ->label('Detail')
                    ->color('gray')
                    ->icon('heroicon-o-eye')
                    ->modalHeading(fn ($record) => "Detail Pendaftar: {$record->name}")
                    ->modalWidth('lg')
                    ->infolist([
                        Section::make()->schema([
                            Grid::make(2)->schema([
                                TextEntry::make('nickname')->label('Nama Panggilan'),
                                TextEntry::make('gender')->label('Jenis Kelamin')->badge(),
                                TextEntry::make('education')->label('Pendidikan'),
                                TextEntry::make('schedule.time_range')->label('Jadwal Kelas'),
                                TextEntry::make('class_type')->label('Pilihan Kelas')->badge(),
                                TextEntry::make('source')->label('Sumber Informasi'),
                                TextEntry::make('school_origin')->label('Asal Sekolah'),
                                TextEntry::make('birth_date')->label('Tanggal Lahir')->date(),
                            ]),
                            TextEntry::make('address')
                                ->label('Alamat Lengkap')
                                ->columnSpanFull(),
                        ]),
                    ])
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup'),

                // 2. Tombol TERIMA — Hanya muncul jika status pending
                Action::make('accept')
                    ->label('Terima')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pendaftar?')
                    ->modalDescription(fn ($record) => "Kamu yakin ingin menerima {$record->name}?")
                    ->action(fn ($record) => $record->update(['status' => 'accepted'])),

                // 3. Tombol EDIT — Aksi bawaan Filament
                // EditAction::make(),

                // 3. Tombol HUBUNGI (WhatsApp)
                Action::make('contact_wa')
                    ->label('Hubungi')
                    ->color('success') // Warna hijau
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(fn ($record) => "https://wa.me/" . preg_replace('/[^0-9]/', '', $record->whatsapp))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}