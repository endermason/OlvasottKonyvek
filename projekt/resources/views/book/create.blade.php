<form method="POST" action="">
    @csrf

    <div>
       Kiválasztott könyv: {{ $book->author->name }}: {{ $book->title }} ({{ $book->year }})
    </div>

    <div>
        <x-label for="time" :value="__('Elolvasás dátuma')" />

        <x-input id="time" class="block mt-1 w-full" type="date" name="time" :value="old('time')" required />
    </div>

    <button class="btn btn-primary">Mentés</button>
</form>
