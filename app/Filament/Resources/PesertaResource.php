<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaResource\Pages;
use App\Models\Peserta;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tambah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Siswa')
                    ->schema([
                        Grid::make()->columns(2)->schema([
                            TextInput::make('nisn')->required()->unique(),
                            TextInput::make('nis')->required(),
                            TextInput::make('nama')->required(),
                            Select::make('jenis_kelamin')
                                ->options([
                                    'L' => 'Laki-laki',
                                    'P' => 'Perempuan',
                                ])
                                ->required(),
                            Select::make('agama')
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Budha' => 'Budha',
                                    'Konghucu' => 'Konghucu',
                                ])
                                ->required(),
                            Select::make('tahun_masuk')
                                ->label('Tahun Masuk')
                                ->options(
                                    collect(range(2000, now()->year))
                                        ->mapWithKeys(fn($year) => [$year => $year])
                                        ->toArray()
                                )
                                ->required(),
                            TextInput::make('jurusan')->required(),
                        ]),
                        Textarea::make('alamat')->columnSpanFull()->required(),
                    ]),

                Section::make('Tempat & Tanggal Lahir')
                    ->schema([
                        Grid::make()->columns(2)->schema([
                            TextInput::make('tempat_lahir')->label('Tempat Lahir')->required(),
                            DatePicker::make('tanggal_lahir')
                                ->label('Tanggal Lahir')
                                ->native(false)
                                ->displayFormat('d M Y')
                                ->required()
                                ->maxDate(now()),
                        ]),
                    ]),

                Section::make('Foto')
                    ->schema([
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->image()
                            ->directory('foto-peserta')
                            ->preserveFilenames()
                            ->imagePreviewHeight('150')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nisn')->searchable(),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('nis'),
                TextColumn::make('jenis_kelamin')
                    ->badge()
                    ->color(fn(string $state): string => $state === 'L' ? 'info' : 'pink'),
                TextColumn::make('agama'),
                TextColumn::make('tahun_masuk')
                    ->label('Masuk Tahun')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('jurusan'),
                ImageColumn::make('foto')
                    ->disk('public') // Pastikan disk yang dipilih adalah 'public'
                    ->url(fn($record) => asset('storage/' . $record->foto)) // Pastikan path ke foto sesuai dengan lokasi storage
                    ->label('Foto')
                    ->width(50)
                    ->height(50)
                    ->circular()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download_pdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray') // Ganti dari heroicon-o-download
                    ->url(fn($record) => route('peserta.pdf', $record))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListPeserta::route('/'),
            'create' => Pages\CreatePeserta::route('/create'),
            'edit' => Pages\EditPeserta::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return 'siswa';
    }

    public static function getPluralLabel(): string
    {
        return 'siswa';
    }
}
