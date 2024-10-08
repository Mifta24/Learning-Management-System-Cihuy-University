<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Course;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CourseResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CourseResource\RelationManagers;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Learning Management';

    public function __construct()
    {
        // Menambahkan middleware pada resource ini
        $this->middleware('role:admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\FileUpload::make('cover')
                    ->image()
                    ->disk('public') // pastikan disk sudah benar
                    ->directory('course-covers') // opsional, direktori penyimpanan
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
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lecturer.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('cover')
                    ->disk('public')
                    ->label('Cover Image')
                    ->square()
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
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Filter by Category'),
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
            return Course::query()->whereHas('lecturer', function ($query) {
                $query->where('id', Auth::user()->id);
            });
        }

        // Jika bukan teacher, kembalikan query default (misalnya, semua data)
        return Course::query();
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function canCreate(): bool
    {
        // Menggunakan Spatie untuk memastikan hanya role "teacher" yang bisa membuat kategori
        return Auth::user()->hasAnyRole(['teacher']);
    }

    public static function canEdit($record): bool
    {
        return Auth::user()->hasAnyRole(['teacher']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
