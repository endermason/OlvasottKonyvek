<form hx-post="/book">
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    @csrf

    <div>
        <x-label for="author" :value="__('Író')"/>
        <x-input id="author" class="block mt-1 w-full" name="author" :value="$author ?? ''" required/>
    </div>


    <div>
        <x-label for="title" :value="__('Cím')"/>
        <x-input id="title" class="block mt-1 w-full" name="title" :value="$title ?? ''" required/>
    </div>

    <div>
        <x-label for="year" :value="__('Kiadás éve')"/>
        <x-input id="year" class="block mt-1 w-full" name="year" :value="$year ?? ''" required/>
    </div>

    <div>
        <x-label for="time" :value="__('Elolvasás dátuma')"/>
        <x-input id="time" class="block mt-1 w-full" type="date" name="time" :value="$time ?? date('Y-m-d')" required/>
    </div>

    <input class="btn btn-primary" type="submit" value="Mentés">

</form>
