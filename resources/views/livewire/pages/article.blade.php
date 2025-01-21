<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <article class="mx-auto prose p-6">
                <h1>
                    {{ $article?->title }}
                </h1>

                <img class="rounded-sm" src="/{{ $article->image->path }}" alt="{{ $article->image->alt_text }}">
                <small>{{ $article->image->caption }}</small>

                {!! $article?->content !!}

            </article>
        </div>
    </div>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            
        </div>
    </div>
</div>
