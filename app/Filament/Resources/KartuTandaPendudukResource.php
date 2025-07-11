<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KartuTandaPendudukResource\Pages;
use App\Filament\Resources\KartuTandaPendudukResource\RelationManagers;
use App\Models\KartuTandaPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Wizard;

use emmanpbarrameda\FilamentTakePictureField\Forms\Components\TakePicture;
use Illuminate\Support\Facades\Auth;

class KartuTandaPendudukResource extends Resource
{
    protected static ?string $model = KartuTandaPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Data Pribadi')
                        ->schema([
                            Forms\Components\TextInput::make('nik')
                                ->visible(Auth::user()->hasRole('super_admin'))
                                ->label('NIK')
                                ->maxLength(16),
                            Forms\Components\TextInput::make('nama')
                                ->label('Nama Lengkap')
                                ->maxLength(255)
                                ->placeholder('Aliya Takwakwak')
                                ->required(),
                            Forms\Components\TextInput::make('tempat_lahir')
                                ->label('Tempat Lahir')
                                ->placeholder('Zurich')
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\DatePicker::make('tanggal_lahir')
                                ->label('Tanggal Lahir')
                                ->required(),
                            Forms\Components\Select::make('jenis_kelamin')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'Laki-laki' => 'Laki-laki',
                                    'Perempuan' => 'Perempuan',
                                ])
                                ->required(),
                            Forms\Components\Select::make('golongan_darah')
                                ->label('Golongan Darah')
                                ->options([
                                    'A' => 'A',
                                    'B' => 'B',
                                    'AB' => 'AB',
                                    'O' => 'O',
                                ]),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Data Keluarga')
                        ->schema([
                            Forms\Components\TextInput::make('nomor_kk')
                                ->label('Nomor KK')
                                ->maxLength(16)
                                ->required(),
                            Forms\Components\Select::make('status_perkawinan')
                                ->label('Status Perkawinan')
                                ->options([
                                    'Belum Kawin' => 'Belum Kawin',
                                    'Kawin' => 'Kawin',
                                    'Cerai Hidup' => 'Cerai Hidup',
                                    'Cerai Mati' => 'Cerai Mati',
                                ])
                                ->required(),
                            Forms\Components\Select::make('agama')
                                ->label('Agama')
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Buddha',
                                    'Khonghucu' => 'Khonghucu',
                                ])
                                ->required(),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Data Alamat')
                        ->schema([
                            Forms\Components\Textarea::make('alamat')
                                ->label('Alamat')
                                ->maxLength(255)
                                ->required()
                                ->rows(3),
                            Forms\Components\TextInput::make('rt_rw')
                                ->label('RT/RW')
                                ->maxLength(7)
                                ->numeric()
                                ->placeholder('001/002')
                                ->mask('999/999')
                                ->regex('/^\d{3}\/\d{3}$/')
                                ->required(),
                            Forms\Components\TextInput::make('kelurahan_desa')
                                ->label('Kelurahan/Desa')
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('kecamatan')
                                ->label('Kecamatan')
                                ->maxLength(255)
                                ->required(),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Data Lainnya')
                        ->schema([
                            Forms\Components\TextInput::make('pekerjaan')
                                ->label('Pekerjaan')
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\Select::make('kewarganegaraan')
                                ->label('Kewarganegaraan')
                                ->options([
                                    'WNI' => 'WNI',
                                    'WNA' => 'WNA',
                                ])
                                ->default('WNI')
                                ->required(),
                            Forms\Components\TextInput::make('berlaku_hingga')
                                ->label('Berlaku Hingga')
                                ->maxLength(255)
                                ->default('SEUMUR HIDUP'),
                            Forms\Components\FileUpload::make('foto')
                                ->label('Foto')
                                ->image()
                                //->directory('ktp-photos')
                                ->maxSize(2048),
                            Forms\Components\DatePicker::make('tanggal_disahkan')
                                ->label('Tanggal Disahkan')
                                ->default(now()),
                        ])
                        ->columns(2),
                ])->skippable()
                ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rt_rw')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelurahan_desa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_perkawinan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kewarganegaraan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('berlaku_hingga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_disahkan')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListKartuTandaPenduduks::route('/'),
            //'create' => Pages\CreateKartuTandaPenduduk::route('/create'),
            //'view' => Pages\ViewKartuTandaPenduduk::route('/{record}'),
            //'edit' => Pages\EditKartuTandaPenduduk::route('/{record}/edit'),
        ];
    }
}
