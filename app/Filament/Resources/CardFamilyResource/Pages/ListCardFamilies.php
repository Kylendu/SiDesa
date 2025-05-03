<?php

namespace App\Filament\Resources\CardFamilyResource\Pages;

use App\Filament\Resources\CardFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCardFamilies extends ListRecords
{
    protected static string $resource = CardFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
