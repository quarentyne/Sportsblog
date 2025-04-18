<x-layout>
    <div class="flex items-center justify-center">
        <form class="py-6 px-18 bg-stone-50 rounded-md grid gap-8" method="POST">
            @csrf
            <x-form-group>
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input class="w-[448px]" name="first_name" id="first_name" type="text" value="{{ old('first_name') }}" placeholder="First Name" required />
                @error('first_name')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input class="w-[448px]" name="last_name" id="last_name" type="text" value="{{ old('last_name') }}" placeholder="Last Name" required />
                @error('last_name')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input class="w-[448px]" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Email" required />
                @error('email')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="password">Password</x-form-label>
                <x-form-input class="w-[448px]" name="password" id="password" type="password" placeholder="Password" required />
                @error('password')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </x-form-group>
            <x-form-group>
                <x-form-label for="password_confirmation">Password one more time</x-form-label>
                <x-form-input class="w-[448px]" name="password_confirmation" id="password_confirmation" type="password" placeholder="Password one more time" required />
            </x-form-group>
            <x-button type="submit" class="bg-green text-white">Register</x-button>
        </form>
    </div>
</x-layout>
