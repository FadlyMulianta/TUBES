<?php

namespace App\Filament\Admin\Resources;

use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\ProdukResource\Pages;
use Filament\Forms\Components\Select;

use function Laravel\Prompts\text;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $navigationGroup = 'Manajemen Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Produk')->schema([
                    TextInput::make('nama_produk')->required(),
                    TextInput::make('deskripsi_produk')->required(),
                    TextInput::make('harga')->required()->numeric(),
                    TextInput::make('stok')->required()->numeric(),
                    TextInput::make('nama_toko')->required(),
                    Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'mustraizer' => 'Mustraizer',
                            'fashwas' => 'Fashwas',
                            'serum' => 'Serum',
                            'sunscreen' => 'Sunscreen',
                            'produk lainnya' => 'Produk Lainnya'
                        ])
                        ->required()
                        ->native(false),
                    FileUpload::make('gambar_produk')
                        ->label('Gambar Produk')
                        ->image()
                        ->disk('public')
                        ->directory('asset/gambar'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk')->label('Nama Produk')->sortable()->searchable(),
                TextColumn::make('deskripsi_produk')->label('Deskripsi')->limit(30),
                TextColumn::make('harga')->label('Harga')->money('IDR'),
                TextColumn::make('stok')->label('Stok'),
                TextColumn::make('nama_toko')->label('Toko')->searchable(),
                TextColumn::make('kategori')->label('Kategori')->searchable(),
                ImageColumn::make('gambar_produk')->label('Gambar'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            // Tambahkan relation managers jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
