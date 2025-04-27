<x-account.layout>
    @if(count($posts))
        <div class="grid grid-cols-2 gap-16 mt-15 ml-34 mr-34">
            @foreach($posts as $post)
                <x-post-card
                    :author="$post->user"
                    :tags="$post->tags"
                    id="{{ $post->id }}"
                    title="{{ $post->title }}"
                    imageSrc="{{ $post->image }}"
                    body="{{ $post->body }}"
                    date="{{ $post->created_at }}"
                    delete="true"
                />
            @endforeach
        </div>
    @else
        <p class="text-center mt-15">Ooops, you haven't written any posts yet</p>
    @endif
</x-account.layout>
