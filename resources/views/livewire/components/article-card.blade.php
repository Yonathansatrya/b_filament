<div>
    <a class="group min-h-[450px] flex flex-col h-full border border-blue-500 hover:border-green-500 hover:shadow-xl transition-all duration-300 rounded-xl p-5 dark:border-green-400 dark:hover:border-transparent dark:hover:shadow-blue-500"
        wire:navigate href="{{ route('article.show', $article) }}">
        <div class="aspect-[16/11]">
            <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $article->image->path) }}"
                alt="{{ $article->image->alt_text }}" />
        </div>

        <div class="my-2">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                {{ $article->title }}
            </h3>
            @if ($article->content)
                <p class="mt-5 text-gray-600 dark:text-neutral-400">
                    {!! Str::limit(tiptap_converter()->asText($article?->content, 20)) !!}
                </p>
            @endif
        </div>

        <div class="text-sm py-3 text-gray-500 dark:text-gray-400 mt-2">
            👀 {{ views($article)->count() }} Views
        </div>

        <div class="mt-auto flex items-center gap-x-3">

            <img class="size-8 rounded-full" src="{{ $article?->user?->profile_photo_url }}" alt="Image Description">
            <div>
                <h5 class="text-sm text-gray-800 dark:text-neutral-200">By {{ $article?->user?->name }}</h5>
            </div>

        </div>
    </a>
</div>
