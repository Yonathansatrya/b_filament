<a class="group relative border border-blue-500 shadow-lg shadow-green-500 hover:border hover:border-blue-500 hover:shadow-xl hover:shadow-blue-500  transition-all duration-300 rounded-xl p-5 dark:border-blue-700 dark:hover:border-blue-500 dark:hover:shadow-blue-500"
    wire:navigate href="{{ route('product.show', $product) }}">
    <div class="aspect-w-16 aspect-h-11">
        <img class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-70"
            src="{{ $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->path) : asset('path/to/default-image.jpg') }}"
            alt="{{ $product->images->isNotEmpty() ? $product->images->first()->alt_text : 'No image available' }}" />
        <h3 class=" mt-2 tetext-sm text-gray-700">
            {{ $product->title }}
        </h3>
        @if ($product->content)
            <p class="mt-1 text-sm text-gray-500">
                {!! Str::limit(tiptap_converter()->asText($product?->content, 100)) !!}
            </p>
        @endif
    </div>
    <h5 class="mt-2 text-sm font-medium text-gray-900">
        Rp {{ number_format($product->price / 100, 0, ',', '.') }}
    </h5>
    <div class="flex items-center">
        <div class="flex items-center">
            <svg class="size-5 shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                data-slot="icon">
                <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="size-5 shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                data-slot="icon">
                <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="size-5 shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                data-slot="icon">
                <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="size-5 shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                data-slot="icon">
                <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="size-5 shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                data-slot="icon">
                <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <p class="sr-only">4 out of 5 stars</p>
    </div>
    <div class="text-sm py-3 text-gray-500 dark:text-gray-400 mt-4">
        👀 {{ views($product)->count() }} Views
    </div>
    <div class="mt-auto flex items-center gap-x-3">
        <img class="size-8 rounded-full" src="{{ $product?->user?->profile_photo_url }}" alt="Image Description">
        <div>
            <h5 class="text-sm text-gray-800 dark:text-neutral-200">{{ $product?->user?->name }}</h5>
        </div>
    </div>
</a>
