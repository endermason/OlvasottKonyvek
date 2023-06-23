<x-app-layout>

    <x-slot name="t">
        E-mail cím megerősítése
    </x-slot>

    <x-slot name="header">
        <h2>Igazold az e-mail címed!</h2>
    </x-slot>

    <div class="mb-3">
        <div class="mb-4">
            Kérjük, ellenőrizd az e-mail fiókodat, és kattints a megerősítő linkre.<br />
            Ha nem kaptad meg az e-mailt, kattints az alábbi gombra a link újraküldéséhez.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4">
                <b>Az e-mailt elküldtük!</b>
            </div>
        @endif

        <div class="mt-4">
            <form class="center-form" method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="mb-3">
                    <button class="btn btn-primary">Megerősítő link újraküldése</button>
                </div>
            </form>

            <form class="center-form" method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Kijelentkezés</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
