<?php

namespace App\Filament\Resources\StacksResource\Pages;

use App\Filament\Resources\StacksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStacks extends ListRecords
{
    protected static string $resource = StacksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
