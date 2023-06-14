<!--<link rel="stylesheet" href="{{ asset('css/main.css') }}">-->
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<x-guest-layout>
    <x-slot name="header">
        <h1>Regisztrálj!</h1>
    </x-slot>
    <x-slot name="bg">
        url('assets/img/register_new.jpg')
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-auth-card>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mt-4" :errors="$errors"/>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="py-12" style="display: flex; margin: auto; text-align: center">
                            <div class="p-6" style="margin: auto">
                                <!-- Name -->
                                <div class="md-4">
                                    <x-label for="name" :value="__('Név')"/>

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                             :value="old('name')" required
                                             autofocus/>
                                </div>

                                <!-- Username -->
                                <div class="mt-4">
                                    <x-label for="username" :value="__('Felhasználónév')"/>

                                    <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                                             :value="old('username')"
                                             required/>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="email" :value="__('E-mail cím')"/>

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             :value="old('email')" required/>
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Jelszó')"/>

                                    <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Jelszó megerősítése')"/>

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required/>
                                </div>

                                <footer>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                       href="{{ route('login') }}">
                                        {{ __('Regisztrált már?') }}
                                    </a>

                                    <button class="btn btn-primary">
                                        {{ __('Regisztrálás') }}
                                    </button>
                                </footer>
                            </div>
                        </div>
                    </form>
                </x-auth-card>
            </div>
        </div>
    </div>
</x-guest-layout>
