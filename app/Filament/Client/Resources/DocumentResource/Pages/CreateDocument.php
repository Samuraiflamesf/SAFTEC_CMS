<?php

namespace App\Filament\Client\Resources\DocumentResource\Pages;

use App\Filament\Client\Resources\DocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;


class CreateDocument extends CreateRecord
{
    // Adiciona o user_create_id ao array de dados antes de criar o registro
    protected static string $resource = DocumentResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Adiciona o user_create_id ao array de dados antes de criar o registro
        $data['user_create_id'] = Auth::id();

        return $data;
    }
}