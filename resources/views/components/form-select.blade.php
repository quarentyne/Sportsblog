<select {{ $attributes->merge(['class' => 'p-3 border border-black rounded-lg focus:outline-none']) }}>
    {{ $slot }}
</select>
