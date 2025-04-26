<x-account.layout>
    <div class="flex items-center justify-center">
        <form class="py-6 px-18 bg-stone-50 rounded-md grid gap-8" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form-group>
                <x-form-label for="category">Category</x-form-label>
                <x-form-select name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-form-select>
                @error('category')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input class="w-[448px]" name="title" id="title" type="text" value="{{ old('title') }}" placeholder="Title" required />
                @error('title')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="body">Blog text</x-form-label>
                <x-form-textarea name="body" id="body">{{ old('body') }}</x-form-textarea>
                @error('body')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <input
                    class="invisible h-0"
                    id="image"
                    name="image"
                    type="file"
                    accept="image/png, image/jpeg"
                    onchange="document.querySelector('#imageLabel img').src = window.URL.createObjectURL(this.files[0])"
                />
                <label id="imageLabel" for="image" class="cursor-pointer">
                    <img alt="Post image" class="object-cover w-[448px] h-[280px]" src="{{ asset('images/placeholder.jpg') }}" />
                </label>
                @error('image')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="title">Tags</x-form-label>
                <x-form-input class="w-[448px]" name="tags" id="tags" type="text" value="{{ old('tags') }}" placeholder="Tags" />
                <span class="text-sm">Write tags separated by commas</span>
            </x-form-group>
            <x-button type="submit" class="bg-green text-white">Create</x-button>
        </form>
    </div>
</x-account.layout>
