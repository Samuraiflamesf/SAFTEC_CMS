<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\LinkResource\Pages;
use App\Filament\Client\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkResource extends Resource
{
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-share';
    }
    public static function getNavigationLabel(): string
    {
        return 'Lista de Links';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Intranet';
    }
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome do Site:')
                    ->required()
                    ->minLength(2)
                    ->maxLength(20),
                Forms\Components\TextInput::make('url')
                    ->label('Link/URL:')
                    ->required()
                    ->minLength(2)
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome do Site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Link/URL')
                    ->limit(20)
                    ->searchable(),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}