<?php

namespace App\Filament\Resources\StrukturDesaResource\Pages;

use App\Filament\Resources\StrukturDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrukturDesa extends EditRecord
{
    protected static string $resource = StrukturDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
