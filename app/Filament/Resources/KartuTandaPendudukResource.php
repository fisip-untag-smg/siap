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
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Support\Facades\Auth;

use Filament\Support\Enums\Alignment;

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
                                //->visible(Auth::user()->hasRole('super_admin'))
                                ->dehydrated(true)
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
                                ->format('Y-m-d')
                                ->displayFormat('d F Y')
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
                                ->maxLength(10)
                                //->numeric()
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
                            TakePicture::make('photo_camera')
                                ->label('Camera Test')
                                ->disk('public')
                                //->directory('uploads/services/payment_receipts_proof')
                                ->visibility('public')
                                ->useModal(true)
                                ->showCameraSelector(true)
                                ->aspect('16:9')
                                ->imageQuality(80)
                                //->multiple(false) // ✅ important: force single file
                                ->dehydrated(true) // ✅ ensure it save as string
                                ->shouldDeleteOnEdit(false),
                            Forms\Components\FileUpload::make('foto')
                                ->label('Foto')
                                ->image()
                                ->dehydrated(false)
                                //->directory('ktp-photos')
                                ->maxSize(2048),
                            Forms\Components\DatePicker::make('tanggal_disahkan')
                                ->label('Tanggal Disahkan')
                                ->format('Y-m-d')
                                ->displayFormat('d F Y')
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
                    ->visible(Auth::user()->hasRole('super_admin'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date('j F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->alignment(Alignment::Center)
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
                    ->alignment(Alignment::Center)
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kewarganegaraan')
                    ->alignment(Alignment::Center)
                    ->searchable(),
                Tables\Columns\TextColumn::make('berlaku_hingga')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo_camera')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_disahkan')
                    ->date('j F Y')
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
                Tables\Actions\Action::make('lihat_ktp')
                    ->label('Lihat KTP')
                    ->icon('heroicon-o-eye')
                    ->url(fn (KartuTandaPenduduk $record): string => route('ktp.view', ['kartuTandaPenduduk' => $record->id]))
                    ->openUrlInNewTab()
                    ->color('primary'),
            ], position: ActionsPosition::BeforeColumns)
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
