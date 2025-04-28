<x-layout>
    <div class="ml-34 mr-34">
        <div class="grid justify-center">
            <h1 class="font-bold max-w-[650px] text-5xl mt-12">{{ $post->title }}</h1>
            <div class="flex items-center gap-2 mt-10 justify-center">
                <img class="w-[48px] h-[48px] rounded-[50%]" alt="Author logo" src="{{ asset('images/' . $post->user->avatar) }}"/>
                <div class="grid gap-1">
                    <span class="text-sm">By {{ $post->user->first_name }} {{ $post->user->last_name }}</span>
                    <span class="text-sm text-stone-800">{{ \Carbon\Carbon::parse($post->date)->format('F d, Y') }}</span>
                </div>
            </div>
        </div>
        <img class="mt-10 rounded-[10px] max-h-[572px] w-full object-contain" alt="{{ $post->title }}" src="{{ asset('images/' . $post->image) }}" />
        <div class="grid grid-cols-[1fr_2fr_1fr] gap-18 mt-10">
            <div></div>
            <div>{{ $post->body }}</div>
            <div>
                <img alt="Banner" src="https://placehold.co/200x238" class="mt-15 sticky top-[60px]" />
            </div>
        </div>
    </div>
</x-layout>
