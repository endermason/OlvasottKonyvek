<x-app-layout>

    <x-slot name="t">
        Kezdőoldal
    </x-slot>

    <x-slot name="header">
        <h2>Üdvözöllek!</h2>
    </x-slot>

    <x-slot name="bg">
        url('assets/img/welcome.jpg')
    </x-slot>

    <!-- Main Content -->
    <div class="mb-3">
        <p>
            Üdvözöllek a KönyvMoly oldalán!<br><br>
            A jobb felső sarokban található menü segítségével tudsz navigálni az oldalon.<br>
            A menüpontok leírását a menüpontok alatt találod.<br><br>
            Jó böngészést!
        </p>
    </div>

</x-app-layout>
