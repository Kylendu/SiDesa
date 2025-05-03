<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;

use App\Models\Resident;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Date;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ResidentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ResidentResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;


class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Penduduk';
    protected static ?string $navigationLabel = 'Penduduk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nik')
                    ->required()
                    ->maxLength(16),
                TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Select::make('gender')
                    ->required()
                    ->options([
                        'male' => 'Laki-laki',
                        'female' => 'Perempuan',
                    ]),
                DatePicker::make('birth_date')
                    ->required()
                    ->label('Tanggal Lahir'),
                TextInput::make('birth_place')
                    ->required()
                    ->maxLength(100)
                    ->label('Tempat Lahir'),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->label('Alamat'),
                Select::make('religion')
                    ->options([
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Katolik' => 'Katolik',
                        'Hindu' => 'Hindu',
                        'Buddha' => 'Buddha',
                        'Konghucu' => 'Konghucu',
                    ])
                    ->label('Agama')
                    ->required(),
                Select::make('marital_status')
                    ->options([
                        'single' => 'Belum Menikah',
                        'married' => 'Menikah',
                        'divorced' => 'Cerai',
                        'widowed' => 'Janda/Duda',
                    ])                    
                    ->label('Status Perkawinan')
                    ->required(),
                TextInput::make('occupation')
                    ->maxLength(100)
                    ->label('Pekerjaan')
                    ->required(),
                TextInput::make('phone')
                    ->maxLength(100)
                    ->required()
                    ->label('No. Telepon'),
                Select::make('status')
                    ->options([
                        'active' => 'Aktif',
                        'deceased' => 'Meninggal',
                    ])
                    ->default('active')
                    ->required()
                    ->label('Status Kependudukan'),
                Select::make('card_family_id')
                    ->relationship('cardFamily', 'no_kk')
                    ->label('Keluarga')
                    ->searchable()
                    ->preload()
                    ->placeholder('Pilih Keluarga'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cardFamily.no_kk')
                    ->label('No. KK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('gender')                    
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->searchable()
                    ->date(),
                TextColumn::make('birth_place')
                    ->label('Tempat Lahir')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('address')
                    ->label('Alamat')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('religion')
                    ->label('Agama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('marital_status')
                    ->label('Status Perkawinan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('occupation')
                    ->label('Pekerjaan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('No. Telepon')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status Kependudukan')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make() 
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
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
