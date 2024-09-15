<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\ExamAnswer;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExamAnswerResource\Pages;
use App\Filament\Resources\ExamAnswerResource\RelationManagers;

class ExamAnswerResource extends Resource
{
    protected static ?string $model = ExamAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 5;

    public function __construct()
    {
        // Menambahkan middleware pada resource ini
        $this->middleware('role:teacher|admin|operator');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('answer')
                    ->required(),
                Forms\Components\Select::make('exam_question_id')
                    ->label('Exam Question')
                    ->relationship('exam_question', 'question')
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
                Tables\Columns\TextColumn::make('exam_question.question')
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


    public static function getEloquentQuery(): Builder
    {
        // Cek apakah user sudah terautentikasi dan memiliki role 'teacher'
        if (Auth::check() && Auth::user()->hasRole('teacher')) {
            return ExamAnswer::query()->whereHas('exam_question', function ($query) {
                $query->whereHas('exam', function ($query) {
                    $query->whereHas('course', function ($query) {
                        $query->where('teacher_id', Auth::user()->id);
                    });
                });
            });
        }

        // Jika bukan teacher, kembalikan query default (misalnya, semua data)
        return ExamAnswer::query();
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
            'index' => Pages\ListExamAnswers::route('/'),
            'create' => Pages\CreateExamAnswer::route('/create'),
            'edit' => Pages\EditExamAnswer::route('/{record}/edit'),
        ];
    }
}
