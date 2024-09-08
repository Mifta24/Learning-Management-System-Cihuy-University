<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseAnswerResource\Pages;
use App\Filament\Resources\CourseAnswerResource\RelationManagers;
use App\Models\CourseAnswer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseAnswerResource extends Resource
{
    protected static ?string $model = CourseAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4; // Mengatur urutan di navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('answer')
                    ->required(),
                Forms\Components\Select::make('course_question_id')
                    ->label('Question')
                    ->relationship('course_question', 'question') // Menggunakan relasi
                    ->required(),
                Forms\Components\Toggle::make('is_correct')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('answer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('course_question.question')
                    ->label('Question')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_correct')
                    ->boolean(),
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
            'index' => Pages\ListCourseAnswers::route('/'),
            'create' => Pages\CreateCourseAnswer::route('/create'),
            'edit' => Pages\EditCourseAnswer::route('/{record}/edit'),
        ];
    }
}
