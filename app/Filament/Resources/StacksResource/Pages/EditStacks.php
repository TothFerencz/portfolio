<?php

namespace App\Filament\Resources\StacksResource\Pages;

use App\Filament\Resources\StacksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStacks extends EditRecord
{
    protected static string $resource = StacksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
