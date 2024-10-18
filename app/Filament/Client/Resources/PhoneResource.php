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
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schema;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;
    public static function getNavigationLabel(): string
    {
        return 'Lista de Ramais';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Intranet';
    }
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-phone';
    }

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
                    ->label('Telefone')
                    ->required()
                    ->tel()
                    ->telRegex('/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/') // Aceita números fixos ou móveis com ou sem traços
                    ->placeholder('(33) 3545-0296') // Exemplo para mostrar como deve ser formatado
                    ->mask(fn($state) => strlen($state) === 13 ? '(99)9999-9999' : '(99)99999-9999') // Ajusta a máscara com base no tamanho do número
                    ->minLength(13) // Para fixo: (XX) XXXX-XXXX
                    ->maxLength(14) // Para móvel: (XX) XXXXX-XXXX
                    ->suffixIcon('heroicon-m-phone'),

                Forms\Components\Select::make('user_create_id')
                    ->relationship('user', 'name') // Relacionamento correto com a tabela 'users'
                    ->label('Usuário que Criou:')
                    ->columnSpanFull()
                    ->visible(fn($record) => $record !== null) // Só exibe durante a edição
                    ->disabled(), // Desabilita o campo para não ser alterado
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