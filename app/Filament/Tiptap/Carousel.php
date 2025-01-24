<?php

namespace App\Filament\Tiptap;

use Filament\Forms\Components\FileUpload;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\Repeater;

class Corousel extends TiptapBlock
{
    public string $preview = 'blocks.previews.stast';

    public string $rendered = 'blocks.rendered.stast';

    public function getFormSchema(): array
    {
        return [

            Repeater::make('members')
                ->schema([
                    FileUpload::make('image')->required(),
                ])
                ->columns(2),
        ];
    }
}
