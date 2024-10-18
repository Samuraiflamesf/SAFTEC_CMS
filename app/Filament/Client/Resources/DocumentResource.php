<?php

namespace App\Filament\Client\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Document;
use Filament\Forms\Form;
use App\Models\NameFolder;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Client\Resources\DocumentResource\Pages;
use App\Filament\Client\Resources\DocumentResource\Pages\EditDocument;
use App\Filament\Client\Resources\DocumentResource\Pages\ListDocuments;
use App\Filament\Client\Resources\DocumentResource\Pages\CreateDocument;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }
    public static function getNavigationLabel(): string
    {
        return 'Lista de Documentos';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Intranet';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nome do Arquivo:'),


                Select::make('folder_id')
                    ->relationship('folder', 'name') // Relacionamento correto com name_folders
                    ->label('Nome da Seção:')
                    ->createOptionForm([
                        TextInput::make('name')->required()->label('Nome da Seção:'),
                    ]),
                FileUpload::make('document')
                    ->required()
                    ->columnSpanFull()
                    ->label('Upload do Documento:')
                    ->directory('Doc')
                    ->disk('public'),

                Forms\Components\Select::make('user_create_id')
                    ->relationship('user', 'name') // Relacionamento com a tabela 'users'
                    ->label('Usuário que Criou:')
                    ->columnSpanFull()
                    ->visible(fn($record) => $record !== null) // Apenas na edição
                    ->disabled(), // Desabilita o campo
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome do Arquivo'),
                TextColumn::make('user.name')->label('Criado por'),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
