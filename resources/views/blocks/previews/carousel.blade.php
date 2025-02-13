<div>
    @foreach($images as $image)
        <img src="{{ Storage::url($image['image']) }}" class="w-32" alt="">
    @endforeach
</div>
