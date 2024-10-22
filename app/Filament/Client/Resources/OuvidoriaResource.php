<?php

namespace App\Filament\Client\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ouvidoria;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Client\Resources\OuvidoriaResource\Pages;



class OuvidoriaResource extends Resource
{
    protected static ?string $model = Ouvidoria::class;

    protected static ?string $modelLabel = 'Ouvidoria';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-bookmark';
    }
    public static function getNavigationLabel(): string
    {
        return 'Processos de Ouvidoria';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Administração';
    }


    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Wizard::make([
                    Wizard\Step::make('Detalhes Gerais')
                        ->schema([
                            // Protocolo
                            TextInput::make('protocolo')
                                ->label('Protocolo:')
                                ->placeholder('Número do Protocolo')
                                ->required()
                                ->columnSpan(3),

                            // Setor
                            Select::make('setor')
                                ->options([
                                    'dasf_diretoria' => 'Diretoria',
                                    'caj' => 'CAJ',
                                    'coafe' => 'COAFE',
                                    'cafab' => 'CAFAB',
                                ])
                                ->label('Setor Encarregada pela Resposta:')
                                ->required()
                                ->columnSpan(3),


                            TextInput::make('demandante')
                                ->label('Demandante:')
                                ->placeholder('Usuário que Registrou Queixa na Ouvidoria')
                                ->required()
                                ->disabled(fn($get) => $get('dado_sigiloso')) // Desabilita se 'dado_sigiloso' estiver ativado
                                ->columnSpan(2),

                            Toggle::make('dado_sigiloso')
                                ->label('Dado Sigiloso')
                                ->inline(false)
                                ->offColor('success') // Cor quando ativado
                                ->onColor('danger') // Cor quando desativado
                                ->offIcon('heroicon-m-lock-open')
                                ->onIcon('heroicon-m-lock-closed')
                                ->reactive() // Torna o campo reativo
                                ->afterStateUpdated(function ($state, callable $set) {
                                    if ($state) {
                                        // Se 'dado_sigiloso' estiver ativado, define o valor do demandante
                                        $set('demandante', 'Dado Sigiloso');
                                    } else {
                                        // Se desativado, limpa o campo
                                        $set('demandante', null);
                                    }
                                })
                                ->columnSpan(1),

                            // Unidade
                            TextInput::make('unidade')
                                ->label('Unidade:')
                                ->placeholder('Unidade envolvida na demanda')
                                ->required()
                                ->columnSpan(3),

                            // Responsável da Aquisição
                            TextInput::make('resp_aquisicao')
                                ->label('Responsável da Aquisição:')
                                ->required()
                                ->columnSpan(3),

                            // Data da última dispensação
                            DatePicker::make('date_dispensacao')
                                ->label('Data da última dispensação:')
                                ->columnSpan(3),
                        ])
                        ->columns(6),


                    Wizard\Step::make('Lista de Medicamentos')
                        ->schema([
                            Repeater::make('medicamentos')
                                ->simple(
                                    TextInput::make('medicamento')
                                        ->label('Adicionar Medicamento:')
                                        ->placeholder('Informe o nome do medicamento'),
                                )
                                ->minItems(1)
                                ->columns(1),
                        ]),

                    Wizard\Step::make('Observações')
                        ->schema([
                            Select::make('author_id')
                                ->label('Autor da Resposta:')
                                ->options(User::all()->pluck('name', 'id'))
                                ->searchable(),
                            DatePicker::make('date_resposta')
                                ->label('Data da resposta:'),
                            RichEditor::make('obs')
                                ->label('Campo de Observação:')
                                ->placeholder('Digite aqui.')
                                ->required()
                                ->columnSpanFull()
                                ->toolbarButtons([
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'underline',
                                    'undo',
                                ]),
                        ])->columns(2),

                    Wizard\Step::make('Anexos')
                        ->schema([
                            FileUpload::make('file_espelho')
                                ->label('Anexo do Espelho:')
                                ->acceptedFileTypes(['application/pdf']) // Tipos de arquivos aceitos
                                ->maxSize(5128)
                                ->downloadable()
                                ->disk('app'),
                            FileUpload::make('file_documents')
                                ->label('Anexos:')
                                ->multiple()
                                ->downloadable(),

                        ]),

                ])
                    ->columnSpan('full'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('demanda')
                    ->label('Demanda')
                    ->searchable() // Permite a busca por este campo
                    ->sortable(), // Permite ordenar por este campo

                TextColumn::make('demandante')
                    ->label('Demandante')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('setor')
                    ->label('Setor')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'caj' => 'warning',
                        'coafe' => 'info',
                        'dasf_diretoria' => 'success',
                        'cafab' => 'danger',
                        default => 'gray', // Define uma cor padrão para valores não mapeados
                    }),


                TextColumn::make('unidade')
                    ->label('Unidade')
                    ->sortable(),

                TextColumn::make('resp_aquisicao')
                    ->label('Resp. de Aquisição')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_dispensacao')
                    ->label('Última Dispensação')
                    ->date('d/m/Y') // Exibe como data no formato desejado
                    ->sortable(),

                TextColumn::make('date_resposta')
                    ->label('Data da Resposta')
                    ->date('d/m/Y')
                    ->sortable(),


            ])
            ->filters([
                SelectFilter::make('setor')
                    ->options([
                        'caj' => 'CAJ',
                        'coafe' => 'COAFE',
                        'dasf_diretoria' => 'Diretoria',
                        'cafab' => 'CAFAB',
                    ])
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
            'index' => Pages\ListOuvidorias::route('/'),
            'create' => Pages\CreateOuvidoria::route('/create'),
            'edit' => Pages\EditOuvidoria::route('/{record}/edit'),
        ];
    }
}