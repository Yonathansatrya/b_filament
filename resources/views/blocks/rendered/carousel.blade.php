<div>
    <x-mary-carousel :slides="array_map(function ($item) {
            return [
                'image' => Storage::url($item['image'])
            ];
        }, $images)" />
</div>
