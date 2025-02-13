<?php

namespace App\Filament\Tiptap;

use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\TextInput;

class Stats extends TiptapBlock
{
    public string $preview = 'blocks.previews.stast';

    public string $rendered = 'blocks.rendered.stast';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('value')->required(),
            TextInput::make('description')->required(),
        ];
    }
}
