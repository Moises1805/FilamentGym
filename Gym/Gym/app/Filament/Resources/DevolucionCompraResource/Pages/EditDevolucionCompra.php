<?php

namespace App\Filament\Resources\DevolucionCompraResource\Pages;

use App\Filament\Resources\DevolucionCompraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevolucionCompra extends EditRecord
{
    protected static string $resource = DevolucionCompraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
