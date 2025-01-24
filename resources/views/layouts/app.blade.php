<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @if (Route::currentRouteName() === 'article')
        {!! seo()->for(Route::current()->parameter('article')) !!}
    @elseif(Route::currentRouteName() === 'category.show')
        {!! seo()->for(Route::current()->parameter('category')) !!}
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')
        <livewire:components.navbar />

        {{-- <!-- Page Heading -->
        @if (isset($header))
            @@ -37,9 +44,8 @@
            {{ $slot }}
            </main>
        @endif --}}
    </div>
    <x-mary-spotlight />
    @stack('modals')
    @livewireScripts
    @livewireScriptConfig
</body>

</html>
