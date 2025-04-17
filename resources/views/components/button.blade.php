@props(['type' => 'button'])
@if($type === 'button')
    <button {{ $attributes->merge(['class' => "font-bold px-5 py-3 rounded-xl uppercase"]) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => "font-bold px-5 py-3 rounded-xl uppercase"]) }}>
        {{ $slot }}
    </a>
@endif

