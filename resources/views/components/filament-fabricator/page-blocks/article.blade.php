@aware(['page'])
@props(['limit', 'category', 'sort_by', 'show_load_more', 'heading', 'description'])

<livewire:components.navbar />
<div class="">
    <div
        class="max-w-full mx-auto text-center bg-blue-500 mb-10 lg:mb-14 p-8 shadow-lg drop-shadow-lg shadow-green-300 text-white">
        <h2 class="text-2xl py-4 font-bold md:text-4xl md:leading-tight">
            {{ $heading }}
        </h2>
    </div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            @if (tiptap_converter()->asText($description))
                <p class="content-center">
                    {!! tiptap_converter()->asHTML($description ?? '', toc: true, maxDepth: 4) !!}
                </p>
            @endif
        </div>
        <livewire:components.article-grid :category="$category" show_load_more="{{ (bool) $show_load_more }}"
            :sort_by="$sort_by" :limit="$limit" />
    </div>
</div>
