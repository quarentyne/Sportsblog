<x-layout>
    <div class="flex items-center justify-center">
        <form class="py-6 px-18 bg-stone-50 rounded-md grid gap-8" method="POST">
            @csrf
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
            <x-button type="submit" class="bg-green text-white">Login</x-button>
        </form>
    </div>
</x-layout>
