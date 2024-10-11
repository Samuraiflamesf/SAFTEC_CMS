<?php

namespace App\Filament\Resources\PaineisResource\Pages;

use App\Filament\Resources\PaineisResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePaineis extends ManageRecords
{
    protected static string $resource = PaineisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
