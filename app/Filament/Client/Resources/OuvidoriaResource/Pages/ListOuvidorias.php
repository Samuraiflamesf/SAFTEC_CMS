<?php

namespace App\Filament\Client\Resources\OuvidoriaResource\Pages;

use App\Filament\Client\Resources\OuvidoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOuvidorias extends ListRecords
{
    protected static string $resource = OuvidoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
