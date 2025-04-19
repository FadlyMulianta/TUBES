<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dokter;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\DokterResource\Pages;
use App\Filament\Admin\Resources\DokterResource\RelationManagers;

class DokterResource extends Resource
{
    protected static ?string $model = Dokter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Dokter';
    protected static ?string $navigationGroup = 'Manajemen Dokter';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_dokter')
                    ->label('Nama Dokter')
                    ->required()
                    ->maxLength(255),

                TextInput::make('harga_konsultasi')
                    ->label('Harga Konsultasi')
                    ->numeric()
                    ->required(),

                TextInput::make('tahun_pengalaman')
                    ->label('Tahun Pengalaman')
                    ->numeric()
                    ->required(),

                TextInput::make('kota')
                    ->label('Kota')
                    ->required(),

                TextInput::make('rating')
                    ->numeric()
                    ->label('Rating (%)')
                    ->default(0),

                TextInput::make('spesialisasi')
                    ->label('Spesialisasi'),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Dokter'),

                TextInput::make('email_dokter')
                    ->label('Email')
                    ->email(),

                TextInput::make('nohp_dokter')
                    ->label('No. HP'),

                
                FileUpload::make('foto')
                    ->image()
                    ->label('Foto Dokter')
                    ->disk('public')
                    ->directory('asset/dokter-photos'),
                Toggle::make('status')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                

                TextColumn::make('nama_dokter')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('spesialisasi')
                    ->sortable(),

                TextColumn::make('kota'),

                TextColumn::make('harga_konsultasi')
                    ->money('IDR'),

                TextColumn::make('rating')
                    ->label('Rating (%)')
                    ->suffix('%'),

                ToggleColumn::make('status')
                    ->label('Aktif')
                    ->sortable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->height(50),
            ])
            ->defaultSort('nama_dokter');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokters::route('/'),
            'create' => Pages\CreateDokter::route('/create'),
            'edit' => Pages\EditDokter::route('/{record}/edit'),
        ];
    }
}
