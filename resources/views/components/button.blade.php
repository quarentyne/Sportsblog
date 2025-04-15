@props(['type' => 'button'])
@if($type === 'button')
    <button {{ $attributes->merge(['class' => "font-bold px-5 py-3 bg-green rounded-xl uppercase text-white"]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => "font-bold px-5 py-3 bg-green rounded-xl uppercase text-white"]) }}>
        {{ $slot }}
    </a>
@endif

