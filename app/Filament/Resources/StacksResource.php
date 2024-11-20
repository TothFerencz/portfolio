<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StacksResource\Pages;
use App\Filament\Resources\StacksResource\RelationManagers;
use App\Models\Stacks;
use Filament\Forms;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StacksResource extends Resource
{
    protected static ?string $model = Stacks::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Stack Name'),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
						->required()
						->image()
						->imageEditor()
						->deletable()
                        ->acceptedFileTypes(['video/*', 'image/*'])
                        ->preserveFilenames()
						->directory('assets/logo'),
                 TagsInput::make('tags')
                        ->label('tags')
                        ->placeholder('Add tags')
                        ->helperText('Add relevant tags for the template.')
                        ->separator(',')
                        ->suggestions([
                            'Frontend',
                            'Backend',
                            'Tools',
                        ]),
              
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->label('URL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Stack Name'),
                Tables\Columns\ImageColumn::make('logo')->label('Logo'),
                Tables\Columns\TagsColumn::make('tags')->label('Tags'),
                Tables\Columns\TextColumn::make('url')->label('URL'),
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
            'index' => Pages\ListStacks::route('/'),
            'create' => Pages\CreateStacks::route('/create'),
            'edit' => Pages\EditStacks::route('/{record}/edit'),
        ];
    }
}