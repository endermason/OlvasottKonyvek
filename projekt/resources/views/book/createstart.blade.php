<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Olvasott könyvek</h2>
    </x-slot>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5" id="main">
        <h5 class="modal-title">Keress könyvet cím alapján</h5>
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

    <!-- Scripts -->
    <script src="/js/htmx.min.js"></script>

</x-app-layout>
