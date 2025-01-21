<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Article as ArticleModel;

class Article extends Component
{
    public ArticleModel $article;

    #[Layout('layouts.app')]

    public function render(): View
    {
        return view('livewire.pages.article');
    }
}
