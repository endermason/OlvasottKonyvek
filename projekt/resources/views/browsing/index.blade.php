<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Vélemények</h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="p-6 row">
            <form class="searchform d-flex justify-content-center mb-4" method="get">
                <input class="searchbar" type="text" value="{{ $search ?? '' }}" name="search"
                       placeholder="Keress a könyvek címében...">
                <button class="btn btn-primary" type="submit">Keresés</button>
            </form>

            @php
                if (request()->has('search')) {
                    $search_query = "&search=".request()->get('search');
                } else {
                    $search_query = "";
                }

                if (request()->has('stars')) {
                    $stars_query = "&stars=".request()->get('stars');
                } else {
                    $stars_query = "";
                }

                if (request()->has('order')) {
                    $order = request()->get('order');
                } else {
                    $order = "";
                }

                if ($order == "tasc") {
                    $order_text = "Cím A-Z";
                } else if ($order == "tdsc") {
                    $order_text = "Cím Z-A";
                } else if ($order == "rasc") {
                    $order_text = "Értékelés növekvő";
                } else if ($order == "rdsc") {
                    $order_text = "Értékelés csökkenő";
                } else if ($order == "dasc") {
                    $order_text = "Dátum növekvő";
                } else if ($order == "ddsc") {
                    $order_text = "Dátum csökkenő";
                } else {
                    $order_text = "Sorba rendezés";
                }
            @endphp

            <div class="col col-sm-2">
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $order_text }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=tasc" }}">Cím A-Z</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=tdsc" }}">Cím Z-A</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=dasc" }}">Dátum növekvő</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=ddsc" }}">Dátum csökkenő</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=rasc" }}">Értékelés növekvő</a></li>
                        <li><a class="dropdown-item" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $stars_query . $search_query . "&order=rdsc" }}">Értékelés csökkenő</a></li>
                    </ul>
                </div>

                <hr>

                <div style="text-align: center"><i>Írók</i></div>
                    @foreach($authors as $author)
                        <div>
                            @if(in_array($author->name, $selected_authors))
                                <b><a href="{{ url()->current() . '?' . http_build_query(array_diff($selected_authors, [$author->name])) . $stars_query . $search_query }}">✔ {{ $author->name }}</a></b>
                            @else
                                <a href="{{ url()->current() . '?' . http_build_query(array_merge($selected_authors, [$author->name])) . $stars_query . $search_query }}">{{ $author->name }}</a>
                            @endif
                        </div>
                    @endforeach

                <hr>

                <div style="text-align: center"><i>Értékelés</i></div>
                <div class="rating">
                    @for($i = 0; $i < 5; $i++)
                        @if((5-$i) == request()->get('stars', 0))
                            <input type="radio" checked>
                            <label for="{{ 5 - $i }}"><a class="star" href="{{ url()->current() . '?' . http_build_query($selected_authors) . $search_query }}">★</a></label>
                        @else
                            <label for="{{ 5 - $i  }}"><a class="star" href="{{ url()->current() . '?' . http_build_query($selected_authors) . '&stars='.(5-$i).  $search_query }}">★</a></label>
                        @endif
                    @endfor
                </div>

                <hr>

                <div><a class="btn btn-primary" href="{{ url()->current() . '?' . http_build_query(array_diff($selected_authors, $selected_authors)) . $search_query }}">Összes törlése</a></div>
            </div>

            <div class="col col-sm-10" id="content" hx-target="this">
                @include('browsing.load')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script>
        //Read more beállítása lapozás után
        document.body.addEventListener('htmx:afterSwap', function (_) {
            AddReadMore();
        });
    </script>

</x-app-layout>
