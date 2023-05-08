<x-guest-layout>
    <x-slot name="header">
        <h1>Erősítsd meg a jelszavad!</h1>
    </x-slot>

    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <button class="btn btn-primary">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
