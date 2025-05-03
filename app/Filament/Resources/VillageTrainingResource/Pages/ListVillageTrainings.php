<?php

namespace App\Filament\Resources\VillageTrainingResource\Pages;

use App\Filament\Resources\VillageTrainingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillageTrainings extends ListRecords
{
    protected static string $resource = VillageTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
