<x-layout>
    @vite(['resources/js/post.js'])
    <div class="ml-34 mr-34">
        <div class="grid justify-center">
            <h1 class="font-bold max-w-[650px] text-5xl mt-12">{{ $post->title }}</h1>
            <div class="flex items-center gap-2 mt-10 justify-center">
                <img class="w-[48px] h-[48px] rounded-[50%]" alt="Author logo" src="{{ asset('images/' . $post->user->avatar) }}"/>
                <div class="grid gap-1">
                    <span class="text-sm">By {{ $post->user->first_name }} {{ $post->user->last_name }}</span>
                    <span class="text-sm text-stone-800">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</span>
                </div>
            </div>
        </div>
        <img class="mt-10 rounded-[10px] max-h-[572px] w-full object-contain" alt="{{ $post->title }}" src="{{ asset('images/' . $post->image) }}" />
        <div class="grid grid-cols-[1fr_2fr_1fr] gap-18 mt-10">
            <div></div>
            <div>
                {{ $post->body }}
                <div class="mt-10 pt-16 border-t-2 border-stone-400">
                    <h3 class="font-bold text-3xl mb-11">Comments</h3>
                    @auth()
                        <div class="flex gap-5 mb-10">
                            <img class="w-[48px] h-[48px] rounded-[50%]" alt="Avatar" src="{{ asset('images/' . Auth::user()->avatar) }}" />
                            <form class="grid gap-6 w-full" id="comment-form" action="{{ route('comments.store') }}">
                                @csrf
                                <input class="hidden" name="post_id" value="{{ $post->id }}" />
                                <x-form-textarea name="body" rows="4" class="border border-stone-300 rounded-lg resize-none p-4" placeholder="Write a comment..."></x-form-textarea>
                                <button type="submit" class="uppercase border-2 border-stone-300 rounded-4xl py-3 px-13 text-stone-500 hover:cursor-pointer hover:text-stone-800 hover:border-stone-800 font-bold justify-self-start">Submit</button>
                            </form>
                        </div>
                    @endauth
                    <div id="comments">
                        @foreach($comments as $comment)
                            <x-comment :data="$comment" />
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <img alt="Banner" src="https://placehold.co/200x238" class="mt-15 sticky top-[60px]" />
            </div>
        </div>
    </div>
</x-layout>
