<div class="p-6">
    @if ($this->articles->count() > 0)

    <div class="max-w[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mx-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">
                Latest Article
            </h2>
        </div>
    </div>
    <div class="grid sm:grid-clols-2 lg:grid:cols-3 gap-6">
        @foreach ($this->articles as $article)
            <livewire:components.article-card :article="$article" :key="$article->id" />
        @endforeach
    </div>
    @endif
</div>