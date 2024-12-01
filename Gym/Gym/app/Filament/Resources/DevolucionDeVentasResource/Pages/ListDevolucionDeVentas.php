<?php

namespace App\Filament\Resources\DevolucionDeVentasResource\Pages;

use App\Filament\Resources\DevolucionDeVentasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDevolucionDeVentas extends ListRecords
{
    protected static string $resource = DevolucionDeVentasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
