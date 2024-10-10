<?php

namespace App\Filament\Client\Resources\LinkResource\Pages;

use App\Filament\Client\Resources\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLinks extends ManageRecords
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
