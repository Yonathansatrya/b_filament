<a class="group relative"
   wire:navigate
   href="{{ route('product.show', $product) }}">
    <div class="aspect-w-16 aspect-h-11">
        <img class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80"
        src="{{ $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->path) : asset('path/to/default-image.jpg') }}"
        alt="{{ $product->images->isNotEmpty() ? $product->images->first()->alt_text : 'No image available' }}" />
        <h3 class="tetext-sm text-gray-700">
            {{ $product->title }}
        </h3>
        @if ($product->content)
            <p class="mt-1 text-sm text-gray-500">
                {!! Str::limit(tiptap_converter()->asText($product?->content, 100)) !!}
            </p>
        @endif
    </div>
    <h5 class="text-sm font-medium text-gray-900">
        {{ Number::currency((float) ($product->price / 100)) }}
    </h5>
</a>

