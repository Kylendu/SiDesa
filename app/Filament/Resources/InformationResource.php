<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Information;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InformationResource\Pages;
use App\Filament\Resources\InformationResource\RelationManagers;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Informasi';
    protected static ?string $navigationLabel = 'Informasi';
    protected static ?string $slug = 'informations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Informasi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('author')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis')
                    ->label('Jenis Informasi')
                    ->options([
                        'berita' => 'Berita',
                        'pengaduan' => 'Pengaduan',
                    ])
                    ->required(),
                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'umum' => 'Umum',
                        'sosial' => 'Sosial',
                        'kesehatan' => 'Kesehatan',
                        'keamanan' => 'Keamanan',
                        'kebersihan' => 'Kebersihan',
                    ])
                    ->required(),
                FileUpload::make('img')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('informations')
                    ->preserveFilenames()
                    ->visibility('public')
                    ->required(),
                RichEditor::make('content')
                    ->label('Konten')
                    ->columnSpanFull()
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'codeBlock',
                        'h2',
                        'h3',
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'code',
                        'link',
                        'bulletedList',
                        'numberedList',
                        'clearFormatting',
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
                    ->label('Judul Informasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jenis')
                    ->label('Jenis Informasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('content')
                    ->label('Konten')
                    ->html()
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->date()
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
            'index' => Pages\ListInformation::route('/'),
            'create' => Pages\CreateInformation::route('/create'),
            'edit' => Pages\EditInformation::route('/{record}/edit'),
        ];
    }
}
