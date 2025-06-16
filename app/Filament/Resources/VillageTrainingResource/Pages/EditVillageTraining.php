<?php

namespace App\Filament\Resources\VillageTrainingResource\Pages;

use App\Filament\Resources\VillageTrainingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageTraining extends EditRecord
{
    protected static string $resource = VillageTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
