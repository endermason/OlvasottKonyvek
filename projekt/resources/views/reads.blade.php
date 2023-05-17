<x-app-layout>
    <x-slot name="header">
        <h1>Olvasott könyvek</h1>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="pb-4">
            <a href="/book/create">Új könyv hozzáadása</a>
        </div>

        <ul>
            @forelse($reads as $read)
                <li hx-target="this" hx-swap="outerHTML">{{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>
                    Elolvasva: {{ date('Y. d. m.', strtotime($read->when)) }}&emsp;
                    <button hx-delete="/book/delete" hx-confirm="Are you sure you wish to delete your account?" hx-vals='{ "_token": "{{ csrf_token() }}", "read_id": "{{ $read->id }}" }'>Törlés</button>
                    @isset($read->review)
                        <br>
                        Véleményed: {{ $read->review->title }}<br>
                        {{ $read->review->review }}<br>
                        Értékelésed: {{ $read->rating->value }}<br>
                    @else
                        <button><a href="/review/create/{{ $read->id }}">Vélemény írása</a></button><br><!-- TODO ~ Link megjelenése nem jó-->
                    @endisset
                </li>
            @empty
                <p>Még nem adtál hozzá egy elolvasott könyvet sem.</p>
            @endforelse
        </ul>
    </div>

    <script src="/js/htmx.min.js"></script>
</x-app-layout>
