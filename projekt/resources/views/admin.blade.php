<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Admin oldal</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <p>A <a href="{{ route('browsing') }}">"Vélemények"</a> oldalon tudod törölni bárkinek a nyilvános véleményét, ha nem megfelelő nyelvezetet használ. A törlés nem visszavonható.</p>
    </div>

</x-app-layout>
