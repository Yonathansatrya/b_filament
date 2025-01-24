<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class TestBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('test')
            ->schema([
                TextInput::make('title')->label('title'), 
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
