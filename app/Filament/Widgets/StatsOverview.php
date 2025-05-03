<?php

namespace App\Filament\Widgets;

use App\Models\Card_family;
use App\Models\Resident;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static bool $isLazy = true;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Penduduk', Resident::count())
                ->description('Jumlah total penduduk')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7,3,4,5,2,4,8]),
            Stat::make('Total Kepala Keluarga', Card_family::count())
                ->description('Jumlah total kepala keluarga')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7,3,4,5,2,4,8]),
        ];
    }
}
