@props(['data'])
<div class="py-10 flex gap-5 border-t border-stone-300">
    <img class="w-[48px] h-[48px] rounded-[50%]" alt="Avatar" src="{{ asset('images/' . $data->user->avatar) }}" />
    <div>
        <span class="block font-semibold text-lg mb-3">{{ $data->user->first_name }} {{ $data->user->last_name }}</span>
        <p class="text-stone-800 mb-3">{{ $data->body }}</p>
        <p class="flex gap-4 text-stone-800">
            <span>{{ $data->created_at->format('d F Y') }}</span>
            <span>{{ $data->created_at->format('g:i a') }}</span>
        </p>
    </div>
</div>
