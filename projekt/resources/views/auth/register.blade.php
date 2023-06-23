<x-app-layout>

    <x-slot name="t">
        Regisztráció
    </x-slot>

    <x-slot name="header">
        <h1>Regisztrálj!</h1>
    </x-slot>

    <x-slot name="bg">
        url('assets/img/register_new.jpg')
    </x-slot>

    <div class="mb-3">
        <x-validation-errors :errors="$errors" />

        <form class="center-form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <x-input id="name" name="name" :value="old('name')" placeholder="Név" required autofocus />
            </div>

            <div class="mb-3">
                <x-input id="username" name="username" :value="old('username')" placeholder="Felhasználónév" required />
            </div>

            <div class="mb-3">
                <x-input id="email" name="email" type="email" :value="old('email')" placeholder="E-mail cím" required />
            </div>

            <div class="mb-3">
                <x-input id="password" name="password" type="password" placeholder="Jelszó" required />
            </div>

            <div class="mb-3">
                <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Jelszó megerősítése" required />
            </div>

            <div class="mb-3">
                <a href="{{ route('login') }}">
                    Regisztrált már?
                </a>
            </div>

            <div style="text-align: center;" class="mb-3">
                <button class="btn btn-primary">
                    Regisztrálás
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
