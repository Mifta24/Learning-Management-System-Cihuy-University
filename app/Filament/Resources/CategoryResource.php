<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1; // Mengatur urutan di navigasi

    public function __construct()
    {
        // Menambahkan middleware pada resource ini
        $this->middleware('role:operator');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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


    public static function canViewAny(): bool
    {
        // Menggunakan Spatie untuk memastikan hanya role "operator" yang bisa melihat resource
        return Auth::user()->hasAnyRole(['operator','admin']);
    }

    public static function canCreate(): bool
    {
        // Menggunakan Spatie untuk memastikan hanya role "operator" yang bisa membuat kategori
        return Auth::user()->hasAnyRole(['operator','admin']);
    }

    public static function canEdit($record): bool
    {
        // Menggunakan Spatie untuk memastikan hanya role "operator" yang bisa mengedit kategori
        return Auth::user()->hasAnyRole(['operator','admin']);
    }

    public static function canDelete($record): bool
    {
        // Menggunakan Spatie untuk memastikan hanya role "operator" yang bisa menghapus kategori
        return Auth::user()->hasAnyRole(['operator','admin']);
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
