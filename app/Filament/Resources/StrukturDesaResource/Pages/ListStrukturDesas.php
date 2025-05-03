<?php

namespace App\Filament\Resources\StrukturDesaResource\Pages;

use App\Filament\Resources\StrukturDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrukturDesas extends ListRecords
{
    protected static string $resource = StrukturDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
