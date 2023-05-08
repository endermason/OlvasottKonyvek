<x-app-layout>
    <x-slot name="header">
        <h1>Olvasott könyvek</h1>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <ul>
            @forelse($reads as $read)
                <li>{{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>Elolvasva: {{ date('Y. d. m.', strtotime($read->when)) }}</li>
            @empty
                <p>Még nem adtál hozzá egy elolvasott könyvet sem.</p>
            @endforelse
        </ul>
    </div>
</x-app-layout>
