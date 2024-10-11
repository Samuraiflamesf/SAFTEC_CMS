<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Painel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PainelResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PainelResource\RelationManagers;

class PainelResource extends Resource
{
    protected static ?string $model = Painel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label(
                        'Nome do Painel:'
                    )
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label('Link/Url:')
                    ->required()
                    ->url()
                    ->maxLength(255),
                FileUpload::make('img')
                    ->required()
                    ->label('Imagem')
                    ->directory('power_bi')
                    ->disk('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome do Painel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label(
                        'Link do Painel'
                    )
                    ->limit(15)
                    ->searchable(),
                ImageColumn::make('img')
                    ->label('Imagem')
                    ->disk('public')
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
            'index' => Pages\ManagePainels::route('/'),
        ];
    }
}
