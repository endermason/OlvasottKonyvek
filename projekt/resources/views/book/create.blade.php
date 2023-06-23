<form class="center-form" hx-post="/book2" hx-target="#main">
    <x-validation-errors :errors="$errors" />

    @csrf

    <div class="mb-3">
        Kiválasztott könyv: {{ $book->author->name }}: {{ $book->title }} ({{ $book->year }})
    </div>

    <div class="mb-3">
        <x-label for="time" value="Elolvasás dátuma"/>
        <x-input id="time" type="date" name="time" :value="$time ?? date('Y-m-d')" required/>
    </div>

    <input type="hidden" name="book_id" value="{{ $book->id }}">

    <button class="btn btn-primary">Mentés</button>

</form>
