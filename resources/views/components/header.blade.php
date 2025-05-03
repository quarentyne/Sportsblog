@props(['background', 'color'])
<header class="mb-5 py-5 px-34 flex justify-between items-center bg-{{ $background }} shadow-md">
    <a href="{{ route('home') }}">
        <img width="180" height="20" src="{{ asset('images/logo_background_' . $background . '.svg') }}" alt="Logo" />
    </a>
    <nav class="flex gap-x-9 items-center text-{{ $color }} font-bold">
        @foreach($categories as $category)
            <a
                href="{{ route('category.show', ['category' => $category->slug]) }}"
                aria-current="{{ request()->is('category/' . $category->slug) ? 'page' : 'false' }}"
            >
                {{ $category->name }}
            </a>
        @endforeach
    </nav>
    @guest()
        <div class="flex gap-x-5 items-center">
            <x-button type="a" href="{{ route('login') }}" class="bg-transparent text-{{ $color }}">Sign in</x-button>
            <x-button type="a" href="{{ route('register') }}" class="bg-green text-white">Sign up</x-button>
        </div>
    @endguest
    @auth()
        <div class="flex gap-x-5 items-center">
            <a href="{{ route('posts.create') }}" class="rounded-[50%] w-[48px] h-[48px] bg-green p-1 flex justify-center items-center">
                <img src="{{ asset('images/pencil.svg') }}" alt="Create post" />
            </a>
            <a href="{{ route('account') }}" class="rounded-[50%] w-[48px] h-[48px] bg-white p-1 overflow-hidden">
                <img src="{{ Auth::user()->avatar ? asset(('images/' . Auth::user()->avatar)) : asset('images/user-icon.svg') }}" alt="Avatar" />
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-button class="bg-red-500 text-white">Logout</x-button>
            </form>
        </div>
    @endauth
</header>
