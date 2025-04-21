<x-account.layout>
    <div class="flex items-center justify-center">
        <form class="py-6 px-18 bg-stone-50 rounded-md grid gap-8" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-group>
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input class="w-[448px]" name="first_name" id="first_name" type="text" value="{{ $user->first_name }}" placeholder="First Name" required />
                @error('first_name')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input class="w-[448px]" name="last_name" id="last_name" type="text" value="{{ $user->last_name }}" placeholder="Last Name" required />
                @error('last_name')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input class="w-[448px]" name="email" id="email" type="email" value="{{ $user->email }}" placeholder="Email" required />
                @error('email')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <input
                    class="invisible h-0"
                    id="avatar"
                    name="avatar"
                    type="file"
                    accept="image/png, image/jpeg"
                    value="{{ $user->avatar }}"
                    onchange="document.querySelector('#avatarLabel img').src = window.URL.createObjectURL(this.files[0])"
                />
                <label id="avatarLabel" for="avatar" class="cursor-pointer">
                    <img alt="Avatar" class="w-[150px] h-[150px]" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user-icon.svg') }}" />
                </label>
                @error('avatar')
                <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-button type="submit" class="bg-green text-white">Save</x-button>
        </form>
    </div>
</x-account.layout>
