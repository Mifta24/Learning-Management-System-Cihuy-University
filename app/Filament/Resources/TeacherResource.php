<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Teacher;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TeacherResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeacherResource\RelationManagers;

class TeacherResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Teachers';


     // Ganti judul di halaman index
     public static function getPluralModelLabel(): string
     {
         return 'Teachers';
     }

     public static function getModelLabel(): string
     {
         return 'Teacher';
     }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Teacher Name'),
            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->label('Teacher Email'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Teacher Name'),
            Tables\Columns\TextColumn::make('email')
                ->label('Teacher Email'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            DeleteAction::make('remove_teacher') // Override delete action
            ->action(function ($record) {
                // Ubah role menjadi 'student' daripada menghapus user
                $record->syncRoles(['student']);
            })
            ->label('Remove Teacher') // Ubah label agar lebih jelas
            ->requiresConfirmation() // Konfirmasi sebelum aksi
            ->color('danger'), // Warna tombol
        ])
        ->bulkActions([

        ]);
    }


     // Gunakan hook untuk mengisi password otomatis sebelum data disimpan
     public static function mutateFormDataBeforeCreate(array $data): array
     {
         // Set password otomatis (misalnya, 'password123')
         $data['password'] = Hash::make('12345678');
         return $data;
     }

     public static function mutateFormDataBeforeSave(array $data): array
     {
         // Jika ada perubahan data selain password, lakukan hal yang sama
         $data['password'] = Hash::make('12345678');
         return $data;
     }

    public static function getEloquentQuery(): Builder
    {
        // Hanya tampilkan user yang memiliki role 'teacher'
        return User::query()->whereHas('roles', function($query) {
            $query->where('name', 'teacher');
        });
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
