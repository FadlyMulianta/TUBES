<?php

namespace App\Filament\Admin\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Admin\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Pengguna';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengguna')->schema([
                    TextInput::make('name')
                        ->label('Nama Depan')
                        ->required(),

                    TextInput::make('namabelakang')
                        ->label('Nama Belakang'),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required(),

                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required(fn($context) => $context === 'create')
                        ->dehydrateStateUsing(fn($state) => bcrypt($state))
                        ->hiddenOn('edit'),
                ]),

                Section::make('Detail Kontak')->schema([
                    TextInput::make('nohp')
                        ->label('No HP')
                        ->tel(),

                    FileUpload::make('foto')
                        ->label('Foto Profil')
                        ->image()
                        ->disk('public')
                        ->directory('asset/user-photos'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Depan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('namabelakang')
                    ->label('Nama Belakang')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nohp')
                    ->label('No HP')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('role')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
                    
                ImageColumn::make('foto')
                ->label('Foto'),
                
                // TextColumn::make('created_at')
                // ->label('Dibuat Pada')
                // ->dateTime()
                // ->sortable(),

                // TextColumn::make('updated_at')
                //     ->label('Diperbarui Pada')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
