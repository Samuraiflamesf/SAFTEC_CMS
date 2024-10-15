<?php

namespace App\Filament\Client\Resources\PhoneResource\Pages;

use App\Filament\Client\Resources\PhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhone extends EditRecord
{
    protected static string $resource = PhoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
