<x-app-layout>

    <x-slot name="t">
        Admin oldal
    </x-slot>

    <x-slot name="header">
        <h2>Admin oldal</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="mb-3">
        <p>A <a href="{{ route('browsing') }}">"Vélemények"</a> oldalon tudod törölni bárkinek a nyilvános véleményét, ha nem megfelelő nyelvezetet használ. A törlés nem visszavonható.</p>
    </div>

</x-app-layout>
