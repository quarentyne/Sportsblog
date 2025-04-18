@props(['type' => 'button'])
@if($type === 'a')
    <a {{ $attributes->merge(['class' => "font-bold px-5 py-3 rounded-xl uppercase"]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => "font-bold px-5 py-3 rounded-xl uppercase cursor-pointer"]) }}>
        {{ $slot }}
    </button>
@endif

