<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Article as ArticleProduct;

class Berita extends Component
{
    public $articles;

    public function mount(): void
    {
        $this->articles = ArticleProduct::isPublished()->get();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.berita');
    }
}
