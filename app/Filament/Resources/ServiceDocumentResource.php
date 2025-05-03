<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Service_document;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceDocumentResource\Pages;
use App\Filament\Resources\ServiceDocumentResource\RelationManagers;
use Filament\Forms\Components\RichEditor;

class ServiceDocumentResource extends Resource
{
    protected static ?string $model = Service_document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Surat';
    protected static ?string $navigationLabel = 'Surat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('surat')
                    ->label('Nama Surat')
                    ->required(),
                FileUpload::make('file_path')
                    ->label('File Dokumen')
                    ->disk('public')
                    ->directory('service-documents')
                    ->preserveFilenames()
                    ->visibility('public')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']) // PDF, DOC, DOCX
                    ->maxSize(5120), // 5 MB
                RichEditor::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull()
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
                        'undo',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('surat')
                    ->label('Nama Surat')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->searchable()
                    ->html()    
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('file_url')
                    ->label('File')
                    ->formatStateUsing(fn () => 'Lihat PDF')
                    ->url(fn ($record) => $record->file_url)
                    ->openUrlInNewTab(),
                
                
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
            'index' => Pages\ListServiceDocuments::route('/'),
            'create' => Pages\CreateServiceDocument::route('/create'),
            'edit' => Pages\EditServiceDocument::route('/{record}/edit'),
        ];
    }
}
