<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\PhoneResource\Pages;
use App\Filament\Client\Resources\PhoneResource\RelationManagers;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome do Setor')
                    ->required()
                    ->minLength(2)
                    ->maxLength(20),
                Forms\Components\TextInput::make('phone')
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->placeholder('(33) 3545-0296')
                    ->suffixIcon('heroicon-m-phone')
                    ->label('Telefone')
                    ->minLength(10)
                    ->maxLength(12)
                    ->required()
                    ->tel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome do Setor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable()
                    ->formatStateUsing(
                        fn(string $state): string =>
                        strlen($state) === 11
                            ? '(' . substr($state, 0, 2) . ') ' . substr($state, 2, 5) . '-' . substr($state, 7) // Formato para 11 dígitos
                            : '(' . substr($state, 0, 2) . ') ' . substr($state, 2, 4) . '-' . substr($state, 6) // Formato para 10 dígitos
                    ),
                Tables\Columns\TextColumn::make('user_create_id')
                    ->label('Criado por:')
                    ->formatStateUsing(fn($state) => \App\Models\User::find($state)?->name),

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
            'index' => Pages\ListPhones::route('/'),
            'create' => Pages\CreatePhone::route('/create'),
            'edit' => Pages\EditPhone::route('/{record}/edit'),
        ];
    }
}
