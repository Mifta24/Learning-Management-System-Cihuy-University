<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LearningMaterial;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LearningMaterialResource\Pages;
use App\Filament\Resources\LearningMaterialResource\RelationManagers;

class LearningMaterialResource extends Resource
{
    protected static ?string $model = LearningMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('video_path'),
                Forms\Components\FileUpload::make('modul_path')
                    ->label('Modul Path')
                    ->required(),
                Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->required()
                    ->relationship('course', 'name', function (Builder $query) {
                        return $query->whereHas('lecturer', function (Builder $query) {
                            $query->where('teacher_id', Auth::user()->id);
                        });
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modul_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->numeric()
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        // Hanya teacher
        if (Auth::user()->hasRole('teacher')) {

            return LearningMaterial::query()->whereHas('course', function ($query) {
                $query->where('teacher_id', Auth::user()->id);
            });
        }

        // Jika bukan teacher, kembalikan query default (misalnya, semua data)
        return LearningMaterial::query();
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
            'index' => Pages\ListLearningMaterials::route('/'),
            'create' => Pages\CreateLearningMaterial::route('/create'),
            'edit' => Pages\EditLearningMaterial::route('/{record}/edit'),
        ];
    }
}
