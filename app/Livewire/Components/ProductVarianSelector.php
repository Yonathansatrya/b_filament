<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\View\View;
use PhpParser\Node\Expr\FuncCall;

class ProductVarianSelector extends Component
{
    public Product $product;
    public $selectedColor = null;
    public array $selectedOptions = [];

    public function mount(): void
    {
        $this->$selectedColor = null;
        $this->$selectedOptions = [];
    }

    public function selectedColor(): void
    {
        $this->selectedColor = $color;
    }

    public function getColorVariants(): Collection
    {
        return collect($this->product->variants)
            ->filter(fn ($variant) => $variant['type'] === 'Color');
    }

    public function getChildrenVariants(): Collection
    {
        if (!$this->selectedColor || !isset($this->product->variants[$this->selectedColor]['children'])) {
            return collect();
        }

        return collect($this->product->variants[$this->selectedColor]['children']);
    }

    public function render(): View
    {
        return view('livewire.components.product-varian-selector', [
            'colorVariants' => $this->getColorVariants(),
            'childrenVariants' => $this->getChildrenVariants(),
        ]);
    }
}
