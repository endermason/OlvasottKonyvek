<x-app-layout>
    <x-slot name="header">
        <h1>Vélemény írása</h1>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <form hx-post="/review">
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach($errors as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            @csrf

            <div>
                <x-label for="title" :value="__('Cím (opcionális)')" />

                <x-input id="title" class="block mt-1 w-full" name="title" :value="old('title') ?? $title ?? ''" required />
            </div>


            <div>
                <x-label for="rating" :value="__('Értékelés')" />

                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5" @if(old('rating') ?? $rating ?? '' == 5) checked @endif><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4" @if(old('rating') ?? $rating ?? '' == 4) checked @endif><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3" @if(old('rating') ?? $rating ?? '' == 3) checked @endif><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2" @if(old('rating') ?? $rating ?? '' == 2) checked @endif><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1" @if(old('rating') ?? $rating ?? '' == 1) checked @endif><label for="1">☆</label>
                </div>
            </div>

            <div>
                <x-label for="review" :value="__('Vélemény')" />

                <textarea id="review" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="review" required>{{ old('review') ?? $review ?? '' }}</textarea>
            </div>

            <div>
                Nyilvános
                <label class="switch" >
                    <input type="checkbox" id="rating" @if(old('public') ?? $public ?? false) checked @endif />
                    <span class="slider round"></span>
                </label>
            </div>

            <input class="btn btn-primary" type="submit" value="Mentés">
        </form>
    </div>

    <script src="/js/htmx.min.js"></script>
</x-app-layout>
