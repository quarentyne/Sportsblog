<x-account.layout>
    @if(count($comments))
        <div class="ml-34 mr-34">
            @foreach($comments as $comment)
                <div class="grid w-full border-t border-stone-300 py-10 first:border-none grid-cols-[1fr_150px]">
                    <div>
                        <a href="{{ route('posts.show', ['post' => $comment->post->id]) }}" class="font-bold text-lg">{{ $comment->post->title }}</a>
                        <p class="text-stone-800">{{ $comment->body }}</p>
                    </div>
                    <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}" class="justify-self-end">
                        @csrf
                        @method('DELETE')

                        <x-button onclick="confirm('Are you sure?')" class="bg-red-500 text-white">Delete</x-button>
                    </form>
                </div>
            @endforeach
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    @else
        <p class="text-center mt-15">Ooops, you haven't written any commets yet</p>
    @endif
</x-account.layout>
