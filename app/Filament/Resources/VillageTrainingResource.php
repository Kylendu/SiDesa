<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Village_training;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VillageTrainingResource\Pages;
use App\Filament\Resources\VillageTrainingResource\RelationManagers;

class VillageTrainingResource extends Resource
{
    protected static ?string $model = Village_training::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Pelatihan';
    protected static ?string $navigationLabel = 'Pelatihan';
    protected static ?string $slug = 'village-trainings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Pelatihan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('img')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('village-trainings')
                    ->preserveFilenames()
                    ->visibility('public')
                    ->required()
                    ->maxSize(5120), // 5 MB
                TextInput::make('link')
                    ->label('Link Pendaftaran')
                    ->url()
                    ->required()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull()
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img')
                    ->label('Gambar')
                    ->circular()
                    ->size(100),
                TextColumn::make('title')
                    ->label('Judul Pelatihan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->searchable()
                    ->html()
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('link')
                    ->label('Link Pendaftaran')
                    ->searchable()
                    ->url(fn ($record) => $record->link)
                    ->formatStateUsing(fn () => 'Daftar Sekarang')
                    ->openUrlInNewTab()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListVillageTrainings::route('/'),
            'create' => Pages\CreateVillageTraining::route('/create'),
            'edit' => Pages\EditVillageTraining::route('/{record}/edit'),
        ];
    }
}
