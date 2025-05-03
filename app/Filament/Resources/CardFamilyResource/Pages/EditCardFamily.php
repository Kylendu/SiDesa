<?php

namespace App\Filament\Resources\CardFamilyResource\Pages;

use App\Filament\Resources\CardFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCardFamily extends EditRecord
{
    protected static string $resource = CardFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
