<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Vélemény szerkesztése</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        {{ $read->book->author->name }}: {{ $read->book->title }} ({{ $read->book->year }})<br>
        Elolvasva: {{ date('Y. d. m.', strtotime($read->when)) }}<br>

        <form hx-post="/review/edit">
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach($errors as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            @csrf

            <div>
                <x-label for="title" :value="__('Cím (opcionális)')"/>
                <x-input id="title" class="block mt-1 w-full" name="title" :value="$title"/>
            </div>

            <div>
                <x-label for="rating" :value="__('Értékelés')"/>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5" @if($rating == 5) checked @endif>
                    <label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4" @if($rating == 4) checked @endif>
                    <label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3" @if($rating == 3) checked @endif>
                    <label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2" @if($rating == 2) checked @endif>
                    <label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1" @if($rating == 1) checked @endif>
                    <label for="1">☆</label>
                </div>
            </div>

            <div>
                <x-label for="review" :value="__('Vélemény')"/>
                <textarea id="review"
                          class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          name="review" required>{{ $review }}</textarea>
            </div>

            <div>
                Nyilvános
                <label class="switch">
                    <input type="checkbox" id="public" name="public" @if($public) checked @endif />
                    <span class="slider round"></span>
                </label>
            </div>

            <input type="hidden" name="read_id" value="{{ $read->id }}">

            <input class="btn btn-primary" type="submit" value="Mentés"> &emsp;
            <button class="btn btn-danger"
                    hx-delete="/review/delete"
                    hx-confirm="Biztosan törölni szeretnéd az értékelést?"
                    hx-vals='{ "_token": "{{ csrf_token() }}", "review_id": "{{ $id }}" }'>Törlés
            </button>
        </form>
    </div>

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>

</x-app-layout>
