<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharacterResource\Pages;
use App\Filament\Resources\CharacterResource\RelationManagers;
use App\Filament\Resources\CharacterResource\RelationManagers\ElementRelationManager;
use App\Filament\Resources\CharacterResource\RelationManagers\PathRelationManager;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
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

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationIcon = 'gameicon-character';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('thumbnail')->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])->directory('character-photos')->required(),
                FileUpload::make('splash_art')->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])->directory('character-photos')->required(),
                TextInput::make('name')->maxLength(255)->required(),
                DatePicker::make('first_appearance')->label('First Appearance')->required(),
                Select::make('rarity')
                    ->options([
                        4 => '4 Stars',
                        5 => '5 Stars'
                    ]),
                Select::make('type')
                    ->options([
                        'Playable Character' => 'Playable Character',
                        'NPC' => 'NPC',
                    ])->required(),
                Select::make('game_id')
                    ->relationship('game', 'name')
                    ->required(),
                Select::make('world_id')
                    ->relationship('world', 'name')
                    ->required(),
                Select::make('faction_id')
                    ->relationship('faction', 'name'),
                Select::make('path_id')
                    ->relationship('characterPath.path', 'name'),
                Select::make('element_id')
                    ->relationship('characterElement.element', 'name'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCharacters::route('/'),
            'create' => Pages\CreateCharacter::route('/create'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
        ];
    }
}
