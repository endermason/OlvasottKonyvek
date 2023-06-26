<x-app-layout>

    <x-slot name="t">
        @if($edit)
            Vélemény szerkesztése
        @else
            Vélemény írása
        @endif
    </x-slot>

    <x-slot name="header">
        <h2>
            @if($edit)
                Vélemény szerkesztése
            @else
                Vélemény írása
            @endif
        </h2>
    </x-slot>

    <!-- Main Content-->
    <div class="mb-3">
        <p class="center">
            {{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>
            Elolvasva: {{ date('Y. m. d.', strtotime($read->when)) }}
        </p>

        <div hx-target="this">
            @include('review.form')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>

</x-app-layout>
