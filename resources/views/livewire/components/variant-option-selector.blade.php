<div>
    <h3 class="text-sm font-medium text-gray-900">
        {{ $variant['label'] }}
    </h3>

    <button
        type="button"
        wire:click="$parent.selectVariant('{{ $variantId }}', '{{ $variant['label'] }}')"
        class="mt-2 flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase"
        :class="{
            'border-transparent bg-indigo-600 text-white hover:bg-indigo-700' : {{ $isSelected ? 'true' : 'false' }},
            'border-gray-200 bg-white text-gray-900 hover:bg-gray-50' : {{ $isSelected ? 'false' : 'true' }}
        }"
    >

    <span>{{ $variant['label'] }}</span>
    </button>
</div>
