<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Forms\Components\Slug;
use Filament\Resources\Resource;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Tables\View\TablesRenderHook;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title'),
                Slug::make('slug')->required()->minLength(5),
                TiptapEditor::make('content')->required(),
                CuratorPicker::make('media_id'),
                Forms\Components\ColorPicker::make('text_color'),
                Forms\Components\ColorPicker::make('background_color'),
                Forms\Components\Toggle::make('is_tag'),
                Forms\Components\Select::make('parent_id')->relationship('parent', 'title'),
                Forms\Components\Hidden::make('user_id')->dehydrateStateUsing(fn($state) =>
                ['user_id' => \Illuminate\Support\Facades\Auth::user()->id]),
                // Forms\Components\Hidden::make('user_id')->dehydrateStateUsing(fn($state) => ['user_id' => auth()->id()]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
