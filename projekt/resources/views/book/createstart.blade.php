<x-app-layout>

    <x-slot name="header">
        <h2>Olvasott könyvek</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="mb-3" id="main">
        <h5>Keress könyvet cím alapján</h5>

        <div>
            <input class="form-control" type="search"
                   name="title" placeholder="Kezd gépelni..."
                   hx-post="/book/search"
                   hx-trigger="keyup changed delay:500ms, search"
                   hx-target="#search-results"
                   hx-vals='{"_token": "{{ csrf_token() }}"}'
                   autofocus>
            <table class="table" id="search-results"></table>
        </div>
    </div>

    <script src="/js/htmx.min.js"></script>

</x-app-layout>
