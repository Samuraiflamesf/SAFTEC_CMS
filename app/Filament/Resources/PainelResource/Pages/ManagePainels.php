<?php

namespace App\Filament\Resources\PainelResource\Pages;

use App\Filament\Resources\PainelResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePainels extends ManageRecords
{
    protected static string $resource = PainelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
