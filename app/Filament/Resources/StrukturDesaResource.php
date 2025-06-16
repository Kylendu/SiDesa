<?php

namespace App\Filament\Resources;

use FFI;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Struktur_desa;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StrukturDesaResource\Pages;
use App\Filament\Resources\StrukturDesaResource\RelationManagers;

class StrukturDesaResource extends Resource
{
    protected static ?string $model = Struktur_desa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Struktur Desa';
    protected static ?string $navigationLabel = 'Struktur Desa';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama')
                ->label('Nama')
                ->required(),
            Select::make('jabatan')
                ->label('Jabatan')
                ->options([
                    'Kepala Desa' => 'Kepala Desa',
                    'Sekretaris Desa' => 'Sekretaris Desa',
                    'Kaur Keuangan' => 'Kaur Keuangan',
                    'Kaur Umum' => 'Kaur Umum',
                    'Kaur Perencanaan' => 'Kaur Perencanaan',
                    'Kasi Pelayanan' => 'Kasi Pelayanan',
                    'Kasi Pemerintahan' => 'Kasi Pemerintahan',
                    'Kasi Kesejahteraan' => 'Kasi Kesejahteraan',
                    'BPD' => 'BPD',
                ])
                ->required(),
            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('struktur-desa')
                ->preserveFilenames(False)
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('foto')
                ->label('Foto')
                ->circular()
                ->size(100),
            TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),
            TextColumn::make('jabatan')
                ->label('Jabatan')
                ->searchable()
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                
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
            'index' => Pages\ListStrukturDesas::route('/'),
            'create' => Pages\CreateStrukturDesa::route('/create'),
            'edit' => Pages\EditStrukturDesa::route('/{record}/edit'),
        ];
    }
}
