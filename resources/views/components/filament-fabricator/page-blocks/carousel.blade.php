@aware(['page'])
@props(['images', 'title', 'description'])

<div>
    <div class="max-w-[90rem] sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-3xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl dark:text-white">
                {{ $title }}
            </h2>
            @if (tiptap_converter()->asText($description))
                <p>
                    {!! tiptap_converter()->asHTML($description ?? '', toc: true, maxDepth: 4) !!}
                </p>
            @endif
        </div>
    </div>
    <div class="w-full max-w-full mt-4 mx-auto">
        <x-mary-carousel :slides="array_map(fn($item) => ['image' => asset('storage/' . $item['image'])], $images)"
            class="w-full h-auto md:h-[700px] lg:h-[800px] object-cover" />
    </div>
