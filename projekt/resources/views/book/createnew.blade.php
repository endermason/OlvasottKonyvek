<form class="center-form" hx-post="/book" hx-target="#main">
    <x-validation-errors :errors="$errors" />

    @csrf

    <div class="mb-3">
        <x-label for="author" value="Író"/>
        <x-input id="author" class="block mt-1 w-full" name="author" :value="$author ?? ''" required/>
    </div>

    <div class="mb-3">
        <x-label for="title" value="Cím"/>
        <x-input id="title" class="block mt-1 w-full" name="title" :value="$title ?? ''" required/>
    </div>

    <div class="mb-3">
        <x-label for="year" value="Kiadás éve"/>
        <x-input id="year" class="block mt-1 w-full" name="year" :value="$year ?? ''" required/>
    </div>

    <div class="mb-3">
        <x-label for="time" value="Elolvasás dátuma"/>
        <x-input id="time" class="block mt-1 w-full" type="date" name="time" :value="$time ?? date('Y-m-d')" required/>
    </div>

    <input class="btn btn-primary" type="submit" value="Mentés">

</form>
