<?php

namespace App\Filament\Client\Resources\LinkResource\Pages;

use App\Filament\Client\Resources\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Adiciona o user_create_id ao array de dados antes de criar o registro
        $data['user_create_id'] = Auth::id();

        return $data;
    }
}