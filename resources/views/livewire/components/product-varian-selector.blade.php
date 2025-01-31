<div class="space-y-8">
    <div>
        <h2 class="text-sm font-medium text-gray-900">Color</h2>
        <div class="mt-4 flex items-center space-x-3">
            @foreach ($colorVariants as $id => $variant)
                <button class="relative h-8 w-8 rounded-full border border-gray-300 p-0.5"
                    :class="{
                        'ring-2 ring-indigo-500': '{{ $selectedColor }}'
                        === '{{ $id }}'
                    }">

                    <span class="block h-full w-full rounded-full" style="background-color: {{ $variant['color'] }}" />

                    <span class="sr-only">{{ $variant['label'] }}</span>
                </button>
            @endforeach
        </div>
        @if ($selectedColor)
            <p class="mt-2 text-sm text-gray-500">
                Selected: {{ $colorVariants[$selectedColor]['label'] }}
            </p>
        @endif
    </div>

    @if ($selectedColor && $childrenVariants->isNotEmpty())
        <div class="space-y-4">
            @foreach ($childrenVariants as $id => $variant)
                <div>
                    <h3 class="textsm font-medium text-gray-500">{{ $variant['label'] }}</h3>
                    <div class="mt-2 grid gird-cols-4 gap-2 sm:grid-cols-6">
                        @foreach ($variant['children'] ?? [] as $childId => $child)
                            <button
                                type="button"
                                wire:click="$set('selectedOptions.{{ $id }}', '{{ $childId }}')"
                                class="flex items-center justify-content rounded-md border py-3 px-4 text-sm font-medium uppercase sm:flex-1"
                                :class="{
                                    'border-transparent bg-indigo-50'
                                }"
                                >
                                <span>{{ $child['label'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


{{-- <div class=" space-y-8">
    <div>
        @foreach ($this->selectedVariants as $index => $selection)
            <div class="mb-4 flex items-center space-x-2 text-sm">
                <span class="text-gray-500">
                    {{ $index > 0 ? '->' : '' }}
                    {{ $selection['value'] }}
                </span>
            </div>
        @endforeach
    </div>
    <div class=" space-y-4">
        @if ($currentVariants)
            @foreach ($currentVariants as $id => $variant)
                @if ($variant['type'] === 'Color')
                    <livewire.components.variants-color-selector :key="'color-'.$id" :variants="$variants"
                        :variantId="$id"
                        :isSelected="isset($selectedVariants[$currentLevel]['id']) && $selectedVariants[$currentLevel]['id'] === $id" />
                @else
                    <livewire.components.variants-color-selector :key="'color-'.$id" :variants="$variants"
                        :variantId="$id"
                        :isSelected="isset($selectedVariants[$currentLevel]['id']) && $selectedVariants[$currentLevel]['id'] === $id" />
                @endif
            @endif
    </div>
</div> --}}
