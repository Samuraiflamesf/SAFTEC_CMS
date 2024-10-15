<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\UserResource\Pages;
use App\Filament\Client\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\DateTimePicker;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nome Completo:')
                    ->maxLength(64),
                Forms\Components\TextInput::make('cpf')
                    ->required()
                    ->label('CPF:')
                    ->mask('999.999.999-99'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label('E-mail:')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_birthday')
                    ->label('Data de Nascimento:')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->revealable()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable()
                    ->formatStateUsing(
                        fn(string $state): string =>
                        substr($state, 0, 3) . '.' . substr($state, 3, 3) . '.' . substr($state, 6, 3) . '-' . substr($state, 9)
                    ),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email ')
                    ->copyMessageDuration(1500),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(
                        'Criado em'
                    )
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}