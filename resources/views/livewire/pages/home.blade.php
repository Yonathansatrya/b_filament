<div class="shadow-lg bg-white border-l-2 border-r-2 border-b2 border-blue-500 ">
    <div
        class="max-w-full mx-auto text-center bg-blue-500 mb-10 lg:mb-14 p-8 shadow-lg drop-shadow-lg shadow-green-300 text-white">
        <h2 class="text-2xl py-4 font-bold md:text-4xl md:leading-tight">
            NBA News & Updates
        </h2>
        <p class="mt-4 py-2 text-lg">
            Ikuti terus berita terbaru dari dunia NBA dengan update real-time.
        </p>
    </div>

    @if ($this->articles->count() > 0)
        <div class="card-body border-spacing-3 max-w-[90rem] px-2 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($this->articles as $article)
                    <livewire:components.article-card :article="$article" :key="$article->id" />
                @endforeach
            </div>
        </div>
    @endif


    <div
        class="max-w-full mx-auto text-center bg-blue-500 mb-10 lg:mb-14 p-8 shadow-lg drop-shadow-lg shadow-green-300 text-white">
        <h2 class="text-2xl py-4 font-bold md:text-4xl md:leading-tight">
            Product Tersedia
        </h2>
        <p class="mt-4 py-2 text-lg">
            Ikuti terus Product terbaru dari Toko Nike && Jordan dengan update real-time.
        </p>
    </div>

    @if ($this->products->count() > 0)
        <div class=" card-body max-w-[85rem] px-4 py-1 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="mt-6 grid grid-cols-3 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($this->products as $product)
                    <livewire:components.product-card :product="$product" :key="$product->id" />
                @endforeach
            </div>
        </div>
    @endif
</div>
