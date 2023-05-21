<form hx-post="/book2">
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    @csrf

    <div>
        Kiválasztott könyv: {{ $book->author->name }}: {{ $book->title }} ({{ $book->year }})
    </div>

    <div>
        <x-label for="time" :value="__('Elolvasás dátuma')"/>
        <x-input id="time" class="block mt-1 w-full" type="date" name="time" :value="$time ?? date('Y-m-d')" required/>
    </div>

    <input type="hidden" name="book_id" value="{{ $book->id }}">

    <button class="btn btn-primary">Mentés</button>

</form>
