<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReadableResource\Pages;
use App\Filament\Resources\ReadableResource\RelationManagers;
use App\Filament\Resources\ReadableResource\RelationManagers\PartsRelationManager;
use App\Models\Readable;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReadableResource extends Resource
{
    protected static ?string $model = Readable::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(2)
                    ->schema([
                        FileUpload::make('image')->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])->directory('readable-photos')->required()
                    ]),
                TextInput::make('title')->maxLength(255)->required(),
                TextInput::make('author')->maxLength(255)->required(),
                Select::make('world_id')
                    ->relationship('world', 'name')
                    ->required(),
                RichEditor::make('description')->columnSpan('full')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title'),
                TextColumn::make('author'),
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
            PartsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReadables::route('/'),
            'create' => Pages\CreateReadable::route('/create'),
            'edit' => Pages\EditReadable::route('/{record}/edit'),
        ];
    }
}
