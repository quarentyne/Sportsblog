@props(['id', 'imageSrc', 'title', 'body', 'date', 'tags', 'author', 'delete' => false])

<div>
    <img class="w-full rounded-[10px] object-cover" src="{{ asset('images/' . $imageSrc) }}" alt="{{ $title }}"/>
    <h6 class="text-black text-2xl mb-4 mt-6 font-bold">
        <a href="{{ route('posts.show', ['post' => $id]) }}">{{ $title }}</a>
    </h6>
    <p class="text-stone-800 text-ellipsis line-clamp-3">{{ $body }}</p>
    @if(count($tags))
        <div class="flex items-center gap-2 mb-2 mt-8">
            @foreach($tags as $tag)
                <x-tag href="{{ route('tags.show', ['tag' => $tag->name]) }}">{{ $tag->name }}</x-tag>
            @endforeach
        </div>
    @endif
    <div class="flex justify-between items-center w-full mt-3">
        <div class="flex gap-2 items-center">
            <span class="text-sm">By {{ $author->first_name }} {{ $author->last_name }}</span>
            <i class="w-[3px] h-[3px] bg-stone-800 rounded-full"></i>
            <span class="text-sm text-stone-800">{{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</span>
        </div>
        @if($delete)
            <form method="POST" action="{{ route('posts.destroy', ['post' => $id]) }}">
                @csrf
                @method('DELETE')

                <x-button onclick="confirm('Are you sure?')" class="bg-red-500 text-white">Delete</x-button>
            </form>
        @endif
    </div>
</div>
