<x-app-layout>

    <x-slot name="t">
        Új jelszó beállítása
    </x-slot>

    <x-slot name="header">
        <h2>Állíts be új jelszót!</h2>
    </x-slot>

    <div class="mb-3">
        <x-validation-errors :errors="$errors" />

        <form class="center-form" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <x-input id="email" name="email" type="email" :value="old('email', $request->email)" placeholder="E-mail cím" required />
            </div>

            <div class="mb-3">
                <x-input id="password" name="password" type="password" placeholder="Új jelszó" required autofocus />
            </div>

            <div class="mb-3">
                <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Új jelszó megerősítése" required />
            </div>

            <div style="text-align: center;" class="mb-3">
                <button class="btn btn-primary">
                    Mentés
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
