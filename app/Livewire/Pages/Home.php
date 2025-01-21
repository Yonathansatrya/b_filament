<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Article as ArticleModel;

class Home extends Component
{
    public $articles;

    public function mount(): void
    {
        $this->articles = ArticleModel::limit(8)->get();
    }

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.pages.home');
    }
}
