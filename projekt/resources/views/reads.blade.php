<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Olvasott könyvek</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <!-- Új könyv -->
        <div class="pb-4">
            <a href="/book/create" class="btn btn-primary" style="text-decoration: none;">Új könyv hozzáadása</a>
        </div>

        <!-- Könyvek listája -->
        <ul>
            @forelse($reads as $read)
                <li hx-target="this" hx-swap="outerHTML">
                    <p>
                        {{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>
                        <i>Elolvasva:</i> {{ date('Y. d. m.', strtotime($read->when)) }}&emsp;

                        <button class="btn btn-primary"
                                hx-delete="/book/delete"
                                hx-confirm="Biztosan törölni szeretnéd ezt a könyvet? @isset($read->review) A hozzá tartozó vélemény is törlődni fog. @endisset"
                                hx-vals='{ "_token": "{{ csrf_token() }}", "read_id": "{{ $read->id }}" }'>Törlés
                        </button>

                        @isset($read->review)
                            <a href="/review/{{ $read->review->id }}"
                               class="btn btn-primary"
                               style="text-decoration: none;">Vélemény szerkesztése</a>
                            <br>
                            <i>Véleményed:</i>{{ $read->review->title }}<br>
                            <span class="add-read-more show-less-content">{{ $read->review->review }}</span><br>
                            <i>Értékelésed:</i>
                            @for($i = 0; $i < $read->review->rating; $i++)
                                <label class="star">★</label>
                            @endfor
                            <br>
                            <i>Nyilvános:</i> {{ $read->review->public ? 'igen' : 'nem' }}<br>
                        @else
                            <a href="/review/create/{{ $read->id }}"
                               class="btn btn-primary"
                               style="text-decoration: none;">Vélemény írása</a><br>
                        @endisset
                    </p>
                </li>
            @empty
                <p>Még nem adtál hozzá egy elolvasott könyvet sem.</p>
            @endforelse
        </ul>
    </div>

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>
    <script src="/js/jquery.min.js"></script>

</x-app-layout>
