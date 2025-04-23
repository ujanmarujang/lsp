<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Template;

class ListTemplates extends ListRecords
{
    protected static string $resource = TemplateResource::class;

    protected function getHeaderActions(): array
    {
        // Cek kalau jumlah Template < 1, baru munculin tombol Create
        return Template::count() === 0
            ? [Actions\CreateAction::make()]
            : [];
    }
}
