<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ArticleNewsResource\Pages;
use App\Filament\Admin\Resources\ArticleNewsResource\RelationManagers;
use App\Models\ArticleNews;
use App\Models\CategoryArticle;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleNewsResource extends Resource
{
    protected static ?string $model = ArticleNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Manajemen Artikel';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Article Title')
                ->required()
                ->live(onBlur: true), // Live update slug when this field is blurred

            // TextInput::make('slug')
            //     ->label('Slug')
            //     ->required()
            //     ->readOnly()
            //     ->dehydrated() // Ensure the field is saved to DB
            //     ->default('')
            //     ->live(onBlur: true)
            //     ->afterStateUpdated(fn (Set $set, $state) => $set('slug', Str::slug($state))),

            Select::make('category_id')
                ->label('Category')
                ->options(fn () => CategoryArticle::pluck('name', 'id'))
                ->required(),

            Textarea::make('content')
                ->label('Content')
                ->required(),

            FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->disk('public')
                ->directory('asset/Artikel')
                ->image()
                ->required(),

            Select::make('is_featured')
                ->label('Featured')
                ->options([
                    'featured' => 'Featured',
                    'not_featured' => 'Not Featured',
                ])
                ->default('not_featured')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                BooleanColumn::make('is_featured')->sortable(),
                TextColumn::make('created_at')->sortable()->label('Created At'),
                ImageColumn::make('thumbnail')->circular()->height(50)
            ])
            ->filters([
                // Optional filters here
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticleNews::route('/'),
            'create' => Pages\CreateArticleNews::route('/create'),
            'edit' => Pages\EditArticleNews::route('/{record}/edit'),
        ];
    }
}
