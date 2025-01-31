<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class VariantOptionSelector extends Component
{

    public $variant;

    public $variantId;

    public $isSelected;

    public function mount($variant, $variantId, $isSelected = false)
    {
        $this->variant = $variant;
        $this->variantId = $variantId;
        $this->isSelected = $isSelected;
    }


    public function render(): View
    {
        return view('livewire.components.variant-option-selector');
    }
}
