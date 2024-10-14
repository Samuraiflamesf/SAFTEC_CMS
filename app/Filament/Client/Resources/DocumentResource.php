<?php

namespace App\Filament\Client\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Document;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Client\Resources\DocumentResource\Pages;
use App\Filament\Client\Resources\DocumentResource\RelationManagers;
use App\Models\NameFolder;
use Filament\Forms\Components\Select;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nome do Arquivo:'),
                FileUpload::make('document')
                    ->required()
                    ->label('Documento')
                    ->directory('Doc')
                    ->disk('public'),
                Select::make('folder_id')
                    ->label('Author')
                    ->options(NameFolder::all()->pluck('name', 'id'))
                // ->relationship('name_folders', 'name')
                // ->createOptionForm([
                //     Forms\Components\TextInput::make('name')
                //         ->label('Nome da Seção:')
                //         ->required()
                //         ->minLength(2)
                //         ->maxLength(20),
                // ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ManageDocuments::route('/'),
        ];
    }
}
