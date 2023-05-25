<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        @auth
            <a class="navbar-brand" href="{{ url('/dashboard') }}">KönyvMoly</a>
        @else
            <a class="navbar-brand" href="{{ url('/') }}">KönyvMoly</a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menü
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('reads') }}">Könyvek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('browsing') }}">Vélemények</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Kilépés</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                              style="display: none;">@csrf</form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">Belépés</a></li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register') }}">Regisztrálás</a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">Kapcsolat</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
