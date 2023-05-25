<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Vélemények</h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="searchform d-flex justify-content-center mb-4" method="get">
                        <input class="searchbar" type="text" value="{{ $search ?? '' }}" name="search"
                               placeholder="Keress a könyvek címében...">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>

                    <div id="content" hx-target="this">
                        @include('browsing.load')
                    </div>
                </div>
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
