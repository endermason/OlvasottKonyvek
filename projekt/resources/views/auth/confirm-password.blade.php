<x-app-layout>

    <x-slot name="t">
        Jelszó megerősítése
    </x-slot>

    <x-slot name="header">
        <h2>Erősítsd meg a jelszavad!</h2>
    </x-slot>

    <div class="mb-3">
        <div class="mb-4 center">
            Erősítsd meg a jelszavad, mielőtt folytatnád.
        </div>

        <x-validation-errors :errors="$errors" />

        <form class="center-form" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-3">
                <x-input id="password" name="password" type="password" placeholder="Jelszó" required autocomplete="current-password" />
            </div>

            <div style="text-align: center;" class="mb-3">
                <button class="btn btn-primary">
                    Megerősítés
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
