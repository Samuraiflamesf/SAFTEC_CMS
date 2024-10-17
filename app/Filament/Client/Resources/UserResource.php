<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\UserResource\Pages;
use App\Filament\Client\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true), // Garante que o e-mail seja único, exceto no próprio registro ao editar
                Forms\Components\TextInput::make('cpf')
                    ->required()
                    ->unique(ignoreRecord: true), // CPF também único
                Forms\Components\TextInput::make('date_birthday')
                    ->label('Date of Birth')
                    ->date(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn($record) => $record === null) // O campo de senha é obrigatório apenas na criação
                    ->minLength(8)
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null) // Criptografa a senha
                    ->label('Password')
                    ->visible(fn($record) => $record === null), // Só exibe o campo de senha ao criar
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('cpf')
                    ->label('CPF')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date_birthday')
                    ->label('Date of Birth')
                    ->date(),
                TextColumn::make('id_empresa'),

                TextColumn::make('id_profession'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
