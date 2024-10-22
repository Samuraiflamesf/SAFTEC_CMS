<?php

namespace App\Filament\Client\Resources\OuvidoriaResource\Pages;

use App\Filament\Client\Resources\OuvidoriaResource;
use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;

class CreateOuvidoria extends CreateRecord
{
    protected static string $resource = OuvidoriaResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Adiciona o user_create_id ao array de dados antes de criar o registro
        $data['user_create_id'] = Auth::id();

        return $data;
    }
}