<div class="navbar w-auto bg-blue-500 shadow-md border-b-2 border-green-500">
    <div class="navbar-start">
        <div aria-label="Mobile Menu Button" tabindex="0" wire:click="toggleDrawer" role="button"
            class="lg:hidden btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </div>
        <a href="{{ route('home') }}" class="flex items-center p-2 text-white font-semibold " wire:navigate>
            <img src="{{ asset('logo-obji-removebg-preview.png') }}" alt="logo" class="h-6 w-6 mr-2">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-5 pt-3 gap-x-4">
            @foreach ($menu->menuItems as $item)
                <li
                    class="border-2 drop-shadow-sm bg-white text-gray-900 rounded-md transition duration-200 hover:bg-blue-600 hover:text-white cursor-pointer">
                    <a href="{{ $item->url }}" wire:navigate class="flex items-center space-x-2 px-3 py-2">
                        @if ($item->icon)
                            <x-mary-icon name="{{ $item->icon }}" />
                        @endif
                        {{ $item->title }}
                    </a>
                </li>
            @endforeach
            {{-- <script>
                document.addEventListener("DOMContentLoaded", function() {
                    function setActiveMenu() {
                        const navbarItems = document.querySelectorAll("#navbar");

                        navbarItems.forEach((item) => {
                            let itemUrl = new URL(item.querySelector("a").href, window.location.origin).pathname;
                            let currentPage = window.location.pathname;

                            if (itemUrl === currentPage) {
                                item.classList.add("bg-yellow-600", "text-white");
                                item.classList.remove("bg-white", "text-gray-900");
                            } else {
                                item.classList.remove("bg-yellow-600", "text-white");
                                item.classList.add("bg-white", "text-gray-900");
                            }
                        });
                    }

                    setActiveMenu();

                    Livewire.on('pageReloaded', () => {
                        setActiveMenu();
                    });
                    const observer = new MutationObserver(() => {
                        setActiveMenu();
                    });

                    observer.observe(document.body, {
                        childList: true,
                        subtree: true
                    });
                });
            </script> --}}
        </ul>
    </div>
    <div class="navbar-end space-x-2">
        @guest
            <a href="{{ route('login') }}" wire:navigate class="btn bg-white text-black hover:bg-blue-600 hover:text-white">
                Login
            </a>
            <a href="{{ route('register') }}" wire:navigate
                class="btn bg-white text-black hover:bg-blue-700 hover:text-white ">
                Register
            </a>
        @endguest
        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="{{ auth()->user()->name }} profile picture"
                            src="{{ auth()->user()->profile_photo_url }}" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-green-300 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    @foreach ($dropdown->menuItems as $item)
                        <li>
                            <a href="{{ $item->url }}" {{ $item->use_navigate ? 'wire:navigate' : '' }}>
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit()">
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
    <x-mary-drawer wire:model="responsiveMenu" class="w-11/12 lg:w-1/3">
        <x-mary-menu class="p-0 m-0">
            @foreach ($menu->menuItems as $item)
                <x-mary-menu-item title="{{ $item->title }}" link="{{ $item->url }}"
                    icon="{{ $item->icon }}" />
            @endforeach
        </x-mary-menu>
    </x-mary-drawer>
</div>
