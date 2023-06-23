<x-app-layout>

    <x-slot name="t">
        Olvasott könyvek
    </x-slot>

    <x-slot name="header">
        <h2>Olvasott könyvek</h2>
    </x-slot>

    <x-slot name="bg">
        url('assets/img/read.jpg')
    </x-slot>

    <!-- Main Content-->
    <div class="mb-3">
        <!-- Új könyv -->
        <div class="pb-4">
            <a href="/book/create" class="btn btn-primary" style="text-decoration: none;">Új könyv hozzáadása</a>
        </div>

        <!-- Könyvek listája -->
        <ul>
            @forelse($reads as $read)
                <div class="card review-card mb-2" hx-target="this" hx-swap="outerHTML">
                    <div class="card-body">
                        <div class="card-title justify-content-between mb-2 d-flex">
                            <div>
                                {{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>
                                <i>Elolvasva:</i> {{ date('Y. m. d.', strtotime($read->when)) }}
                            </div>
                            <div class="ml-auto">
                                <button class="btn btn-primary"
                                        hx-delete="/book/delete"
                                        hx-confirm="Biztosan törölni szeretnéd ezt a könyvet? @isset($read->review) A hozzá tartozó vélemény is törlődni fog. @endisset"
                                        hx-vals='{ "_token": "{{ csrf_token() }}", "read_id": "{{ $read->id }}" }'>Törlés
                                </button>

                                @isset($read->review)
                                    <a href="/review/{{ $read->review->id }}"
                                       class="btn btn-primary"
                                       style="text-decoration: none;">Vélemény szerkesztése</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <i>Értékelésed:</i>
                            @for($i = 0; $i < $read->review->rating; $i++)<label class="star">★</label>@endfor
                            <br>
                            <i>Nyilvános:</i> {{ $read->review->public ? 'Igen' : 'Nem' }}<br>
                            @if(strlen($read->review->title)>0){{ $read->review->title }}<br><br>@endisset
                            <span class="add-read-more show-less-content">{{ $read->review->review }}</span><br>
                        </div>
                                @else
                                    <a href="/review/create/{{ $read->id }}"
                                       class="btn btn-primary"
                                       style="text-decoration: none;">Vélemény írása</a><br>
                            </div>
                        </div>
                                @endisset
                    </div>
                </div>
            @empty
                <p>Még nem adtál hozzá egy elolvasott könyvet sem.</p>
            @endforelse
        </ul>
    </div>

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>

</x-app-layout>
