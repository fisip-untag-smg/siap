<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IjinUsahaResource\Pages;
use App\Filament\Resources\IjinUsahaResource\RelationManagers;
use App\Models\IjinUsaha;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Wizard;

class IjinUsahaResource extends Resource
{
    protected static ?string $model = IjinUsaha::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Data Pemohon')
                    ->schema([
                Forms\Components\TextInput::make('nama')
                    ->placeholder('Nama Lengkap')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                ->label('NIK')
                    ->placeholder('diisi dengan NPM')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->placeholder('jajal@jajal.com')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->label('Nomor HP')
                    ->placeholder('081223456789')
                    ->maxLength(255),
                Forms\Components\TextArea::make('alamat')
                    ->maxLength(255),
                    ])->columns(2),
                Wizard\Step::make('Informasi Usaha')
                    ->schema([
                Forms\Components\TextInput::make('nama_usaha')
                    ->placeholder('Mencari Cinta Sejati')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_usaha')
                    ->placeholder('PT/CV/UD')
                    ->maxLength(255),
                Forms\Components\TextArea::make('alamat_usaha')
                    ->maxLength(255),
                Forms\Components\TextInput::make('modal_usaha')
                    ->maxLength(255),
                Forms\Components\TextArea::make('deskripsi')
                    ->maxLength(255),
                    ])->columns(2),
                Wizard\Step::make('Dokumen Pendukung')
                    ->schema([
                Forms\Components\FileUpload::make('ktp'),
                Forms\Components\FileUpload::make('npwp'),
                Forms\Components\FileUpload::make('akte_pendirian'),
                Forms\Components\FileUpload::make('surat_domisili_usaha'),
                ])->columns(2),
                ])->skippable(true)->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modal_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ktp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npwp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('akte_pendirian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surat_domisili_usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIjinUsahas::route('/'),
            //'create' => Pages\CreateIjinUsaha::route('/create'),
            //'view' => Pages\ViewIjinUsaha::route('/{record}'),
            //'edit' => Pages\EditIjinUsaha::route('/{record}/edit'),
        ];
    }
}
