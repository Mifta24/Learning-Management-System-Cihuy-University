<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CourseStudent;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseStudentResource\Pages;
use App\Filament\Resources\CourseStudentResource\RelationManagers;

class CourseStudentResource extends Resource
{
    protected static ?string $model = CourseStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name', function (Builder $query) {
                        $query->whereHas('roles', function (Builder $query) {
                            $query->where('name', 'student');
                        });
                    })
                    ->label('Student'),
                Forms\Components\Select::make('course_id')
                    ->required()
                    ->relationship('course', 'name')
                    ->label('Course'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
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

        // public static function getEloquentQuery(): Builder
        // {
        //     // Hanya tampilkan pengguna dengan role 'student'
        //     return parent::getEloquentQuery()
        //         ->whereHas('users.roles', function (Builder $query) {
        //             $query->where('name', 'student');
        //         });
        // }

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
            'index' => Pages\ListCourseStudents::route('/'),
            'create' => Pages\CreateCourseStudent::route('/create'),
            'edit' => Pages\EditCourseStudent::route('/{record}/edit'),
        ];
    }
}
