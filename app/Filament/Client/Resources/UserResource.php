<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\UserResource\Pages;
use App\Filament\Client\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nome Completo:')
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->label(
                        'E-mail:'
                    )
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('cpf')
                    ->required()
                    ->label('CPF:')
                    ->mask('999.999.999-99')
                    ->unique(ignoreRecord: true),

                DatePicker::make('date_birthday')
                    ->displayFormat('d m Y')  // Exibe para o usuário no formato d/m/Y
                    ->label('Data de Nascimento:')
                    ->required(),


                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required(fn($record) => $record === null) // O campo de senha é obrigatório apenas na criação
                    ->minLength(8)
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null) // Criptografa a senha
                    ->label('Password')
                    ->visible(fn($record) => $record === null), // Só exibe o campo de senha ao criar

                Select::make('id_empresa')
                    ->relationship('empresa', 'name') // Relacionamento com a tabela 'empresas'
                    ->label('Empresa:')
                    ->createOptionForm([ // Permite criar uma nova empresa diretamente
                        TextInput::make('name')->required()->label('Nome da Empresa'),
                        TextInput::make('sub_contrato')->required()->label('Sub Contrato')
                            ->helperText('Ex: PPE (Projeto Primeiro Emprego) ou SAFTEC'),
                        Select::make('type_vinc')
                            ->options([
                                'terceirizado' => 'Terceirizado',
                                'estatutario' => 'Estatutário',
                                'estagiario' => 'Estagiário',
                                'cargo' => 'Cargo',
                            ])
                            ->label('Tipo de Vinculação')
                            ->native(false)
                    ])
                    ->required(), // Campo obrigatório
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
