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
    <form action="{{ route('search') }}" class="flex items-center gap-x-2">
        <x-form-input
            name="query"
            placeholder="Search posts"
            value="{{ request('query', '') }}" />
        <button type="submit" class="cursor-pointer">
            <svg fill="#000000" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 488.4 488.4" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6 s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2 S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7 S381.9,104.65,381.9,203.25z"></path> </g> </g> </g></svg>
        </button>
    </form>
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
