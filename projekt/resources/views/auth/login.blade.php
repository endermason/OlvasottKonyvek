<x-app-layout>

    <x-slot name="t">
        Bejelentkezés
    </x-slot>

    <x-slot name="header">
        <h1>Lépj be!</h1>
    </x-slot>

    <x-slot name="bg">
        url('assets/img/login.jpg')
    </x-slot>

    <div class="mb-3">
        <x-validation-errors :errors="$errors" />

        <form class="center-form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <x-input id="username" name="username" :value="old('username')"  placeholder="Felhasználónév" required autofocus />
            </div>

            <div class="mb-3">
                <x-input id="password" name="password" type="password" placeholder="Jelszó" required autocomplete="current-password" />
            </div>

            <div class="mb-3">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Maradj bejelentkezve</span>
                </label>
            </div>

            <div class="mb-3">
                <a href="{{ route('password.request') }}">
                    Elfelejtetted a jelszavad?
                </a>
            </div>

            <div style="text-align: center;" class="mb-3">
                <button class="btn btn-primary">
                   Belépés
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
