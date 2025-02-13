<?php

namespace App\Livewire\Pages;

use App\Models\Product as ProductModel;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Toko extends Component
{
    public $products;

    public function mount(): void
    {
        $this->products = ProductModel::isPublished()->get();
    }

    #[Layout('layouts.app')]
    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.pages.toko');
    }
}
