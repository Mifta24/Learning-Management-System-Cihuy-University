<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseQuestionResource\Pages;
use App\Filament\Resources\CourseQuestionResource\RelationManagers;
use App\Models\CourseQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseQuestionResource extends Resource
{
    protected static ?string $model = CourseQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3; // Mengatur urutan di navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required(),
                    Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name') // Menggunakan relasi
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable(),
                Tables\Columns\TextColumn::make('course_id')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseQuestions::route('/'),
            'create' => Pages\CreateCourseQuestion::route('/create'),
            'edit' => Pages\EditCourseQuestion::route('/{record}/edit'),
        ];
    }
}
