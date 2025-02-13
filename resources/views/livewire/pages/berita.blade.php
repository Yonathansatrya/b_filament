<div>
    <div
        class="max-w-full mx-auto text-center bg-blue-500 mb-10 lg:mb-14 p-8 shadow-lg drop-shadow-lg shadow-green-300 text-white">
        <h2 class="text-2xl py-4 font-bold md:text-4xl md:leading-tight">
            NBA News & Latest Berita
        </h2>
    </div>
    <div class="card-body border-spacing-3 max-w-[85rem] px-2 py-2 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($this->articles as $article)
                <livewire:components.article-card :article="$article" :key="$article->id" />
            @endforeach
        </div>
    </div>
    <p class="mt-4 py-2 text-lg text-center shadow-lg border-2 border-blue-200">
        Ikuti terus berita terbaru dari dunia NBA dengan update real-time.
    </p>
    <div class="w-full flex justify-center">
        <img src="{{ asset('storage/iklan.jpg') }}" alt="Iklan" class="w-full max-w-full h-[200px] object-cover rounded-lg shadow-md">
    </div>
</div>
