<?php

namespace App\Filament\Resources\DevolucionDeVentasResource\Pages;

use App\Filament\Resources\DevolucionDeVentasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevolucionDeVentas extends EditRecord
{
    protected static string $resource = DevolucionDeVentasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
