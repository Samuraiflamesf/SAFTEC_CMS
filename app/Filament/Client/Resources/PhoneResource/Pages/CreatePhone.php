<?php

namespace App\Filament\Client\Resources\PhoneResource\Pages;

use App\Filament\Client\Resources\PhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePhone extends CreateRecord
{
    protected static string $resource = PhoneResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Adiciona o user_create_id ao array de dados antes de criar o registro
        $data['user_create_id'] = Auth::id();

        return $data;
    }
}
