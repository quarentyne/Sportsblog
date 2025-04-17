@props(['background', 'color'])
<header class="py-5 px-34 flex justify-between items-center bg-{{ $background }}">
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
            <x-button type="a" href="/login" class="bg-transparent text-{{ $color }}">Sign in</x-button>
            <x-button type="a" href="/register" class="bg-green text-white">Sign up</x-button>
        </div>
    @endguest
</header>
