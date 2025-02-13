<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use App\Models\Article as ArticleModel;

class Article extends Component
{
    public ArticleModel $article;

    public $relatedArticles;

    public function mount(ArticleModel $article): void
    {
        $this->article = $article->load('categories');
        views($this->article)->record();

        $this->relatedArticles = ArticleModel::whereHas('categories', function ($query) {
            $query->whereIn('categories.id', $this->article->categories->pluck('id'));
        })
        ->where('id', '!=', $this->article->id)
        ->latest()
        ->limit(4)
        ->get();
    }

    #[Layout('layouts.app')]

    public function render(): View
    {
        return view('livewire.pages.article', [
            'article' => $this->article,
            'relatedArticles' =>$this->relatedArticles,
        ]);
    }
}
