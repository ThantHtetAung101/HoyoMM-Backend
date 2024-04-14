<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ElementResource\Pages;
use App\Filament\Resources\ElementResource\RelationManagers;
use App\Models\Element;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ElementResource extends Resource
{
    protected static ?string $model = Element::class;

    protected static ?string $navigationIcon = 'uni-fire-o';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(2)
                    ->schema([
                        FileUpload::make('thumbnail')->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])->directory('element-photos')->required()
                    ]),
                TextInput::make('name')->maxLength(255)->required(),
                Select::make('game_id')
                    ->relationship('game', 'name')
                    ->required(),
                RichEditor::make('description')->columnSpan('full')->required(),
                Builder::make('content')
                    ->blocks([
                        Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2),
                        Block::make('paragraph')
                            ->schema([
                                RichEditor::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                            ]),
                        Block::make('images')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Images')
                                    ->image()
                                    ->multiple()
                                    ->directory('content-images')
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('name')
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
            'index' => Pages\ListElements::route('/'),
            'create' => Pages\CreateElement::route('/create'),
            'edit' => Pages\EditElement::route('/{record}/edit'),
        ];
    }
}
