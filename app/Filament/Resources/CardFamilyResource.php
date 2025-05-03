<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Card_family;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CardFamilyResource\Pages;
use App\Filament\Resources\CardFamilyResource\RelationManagers;

class CardFamilyResource extends Resource
{
    protected static ?string $model = Card_family::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Penduduk';
    protected static ?string $navigationLabel = 'Kartu Keluarga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_kk')->required()->unique(),
                Select::make('kepala_keluarga_id')
                    ->relationship('kepalaKeluarga', 'name')
                    ->label('Kepala Keluarga')
                    ->searchable()
                    ->required(),
                TextInput::make('rt')->required(),
                TextInput::make('rw')->required(),
                TextInput::make('desa')->required(),
                TextInput::make('kecamatan')->required(),
                TextInput::make('kabupaten')->required(),
                TextInput::make('provinsi')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_kk')
                    ->label('No KK'),
                TextColumn::make('kepalaKeluarga.name')
                    ->label('Kepala Keluarga'),
                TextColumn::make('rt')
                    ->label('RT'),
                TextColumn::make('rw')
                    ->label('RW'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCardFamilies::route('/'),
            'create' => Pages\CreateCardFamily::route('/create'),
            'edit' => Pages\EditCardFamily::route('/{record}/edit'),
        ];
    }
}
