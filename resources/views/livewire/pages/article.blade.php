<div class="py-12 space-y-3">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white dark:bg-gray-800 shadow rounded">
            <article class="mx-auto prose p-6">
                <h1>
                    {{ $article->title }}
                </h1>

                @if (isset($article->image))
                    <img class="rounded-sm" src="{{ asset('storage/' . $article->image->path) }}"
                        alt="{{ $article->image->alt_text }}" />
                @else
                    <img class="rounded-sm" src="{{ asset('images/default-image.jpg') }}" alt="Default Image" />
                @endif

                {!! tiptap_converter()->asHTML($article->content ?? '', toc: true, maxDepth: 4) !!}

                @foreach ($article->categories as $category)
                    <x-tag-component :category="$category" />
                @endforeach
            </article>  
        </div>

        <!-- BAGIAN BACA JUGA -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-300">Baca Juga</h2>
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach ($relatedArticles as $relatedArticle)
                    <a href="{{ route('article.show', $relatedArticle) }}"
                        class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white dark:bg-gray-800 shadow hover:bg-gray-100 dark:hover:bg-gray-700 transition">

                        <span class="absolute inset-0 overflow-hidden rounded-md">
                            <img src="{{ asset('storage/' . $relatedArticle->image->path) }}"
                                alt="{{ $relatedArticle->image->alt_text }}"
                                class="size-full object-cover">
                        </span>

                        <span class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white text-xs p-1 w-full truncate">
                            {{ $relatedArticle->title }}
                        </span>

                        <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2"></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
