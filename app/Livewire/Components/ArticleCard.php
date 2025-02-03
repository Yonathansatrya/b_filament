<?php

namespace App\Livewire\Components;


use App\Models\Article;
use Livewire\Component;
use Illuminate\View\View;

final class ArticleCard extends Component
{
    public Article $article;

    public function render(): View
    {
        return view('livewire.components.article-card');
    }
}
