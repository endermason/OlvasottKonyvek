<form class="center-form" @if($edit)
          hx-post="/review/edit"
      @else
          hx-post="/review"
    @endif
>
    <x-validation-errors :errors="$errors" />

    @csrf

    <div class="mb-3">
        <x-label for="title" value="Cím (opcionális)"/>
        <x-input id="title" class="block mt-1 w-full" name="title" :value="$title ?? ''"/>
    </div>

    <div class="mb-3">
        <x-label for="rating" value="Értékelés"/>
        <div class="rating">
            <input type="radio" name="rating" value="5" id="5" @if($rating ?? '' == 5) checked @endif>
            <label for="5">☆</label>
            <input type="radio" name="rating" value="4" id="4" @if($rating ?? '' == 4) checked @endif>
            <label for="4">☆</label>
            <input type="radio" name="rating" value="3" id="3" @if($rating ?? '' == 3) checked @endif>
            <label for="3">☆</label>
            <input type="radio" name="rating" value="2" id="2" @if($rating ?? '' == 2) checked @endif>
            <label for="2">☆</label>
            <input type="radio" name="rating" value="1" id="1" @if($rating ?? '' == 1) checked @endif>
            <label for="1">☆</label>
        </div>
    </div>

    <div class="mb-3">
        <x-label for="review" value="Vélemény"/>
        <textarea id="review"
                  class="form-control"
                  name="review" required>{{ $review ?? '' }}</textarea>
    </div>

    <div class="mb-3">
        Nyilvános?
        <label class="switch">
            <input type="checkbox" id="public" name="public" @if($public ?? false) checked @endif />
            <span class="slider round"></span>
        </label>
    </div>

    <input type="hidden" name="read_id" value="{{ $read->id }}">

    <input class="btn btn-primary" type="submit" value="Mentés">

    @if($edit)
        &emsp;
    <button class="btn btn-danger"
            hx-delete="/review/delete"
            hx-confirm="Biztosan törölni szeretnéd az értékelést?"
            hx-vals='{ "_token": "{{ csrf_token() }}", "review_id": "{{ $id }}" }'>Törlés
    </button>
    @endif

</form>
