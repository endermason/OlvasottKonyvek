<x-app-layout>

    <x-slot name="t">
        Elfelejtett jelszó
    </x-slot>

    <x-slot name="header">
        <h2>Elfelejtetted a jelszavad?</h2>
    </x-slot>

    <div class="mb-3">
        <div class="mb-4">
            Elfelejtetted a jelszavad? Semmi gond.<br />
            Csak add meg az e-mail címedet, és küldünk egy linket, amivel új jelszót állíthatsz be.
        </div>

        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @else
            <x-validation-errors :errors="$errors" />

            <form class="center-form" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block mb-3">
                    <x-input id="email" name="email" type="email" :value="old('email')"  placeholder="E-mail cím" required autofocus />
                </div>

                <div style="text-align: center;" class="mb-3">
                    <button class="btn btn-primary">
                        Küldés
                    </button>
                </div>
            </form>
        @endif
    </div>

</x-app-layout>
