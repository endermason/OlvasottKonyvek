<div id="results">
    @foreach($reviews as $review)
        <div class="card review-card mb-2">
            <div class="card-body">
                <div class="card-title justify-content-between mb-2">
                    <i>Könyv:</i> {{ $review->read->book->author->name }}: {{ $review->read->book->title }} ({{ $review->read->book->year }})
                    @if($review->review_title != '')
                        <br><i>Vélemény címe:</i> {{ $review->review_title }}
                    @endisset
                    <br>
                    <i>Értékelés:</i> @for($i = 0; $i < $review->rating; $i++) <label class="star">★</label> @endfor
                    <br>
                    <i>Értékelő:</i> {{ $review->read->user->username }}
                </div>
                <div class="card-body">
                    <span class="add-read-more show-less-content">{{ $review->review }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
<nav>
    <ul class="pagination justify-content-center">
        <!-- Első oldal, ha nem ott áll, egyébként disabled -->
        <li class="page-item"><a class="page-link @if($page == 1) disabled @else cursor-pointer @endif" hx-get="{{ route('browsing.load', 1) }}">Legelső</a></li>
        <!-- Korábbi oldal, ha van, egyébként disabled -->
        <li class="page-item"><a class="page-link @if($page == 1) disabled @else cursor-pointer @endif" hx-get="{{ route('browsing.load', $page - 1) }}">Előző</a></li>
        <!-- 5 oldal megjelenítése, ha van -->
        @for($i = $page - 3; $i < $page + 2; $i++)
            @continue($i < 0 || $i >= $size)
            <!-- Aktuális oldal kiemelése -->
            @if($page == $i + 1)
                <li class="page-item"><a class="page-link active cursor-default">{{ $i + 1 }}</a></li>
            <!-- Egyébként sima link -->
            @else
                <li class="page-item"><a class="page-link cursor-pointer" hx-get="{{ route('browsing.load', $i+1) }}">{{ $i + 1 }}</a></li>
            @endif
        @endfor
        <!-- Következő oldal, ha van, egyébként disabled -->
        <li class="page-item"><a class="page-link @if($page >= $size) disabled @else cursor-pointer @endif" hx-get="{{ route('browsing.load', $page + 1) }}">Következő</a></li>
        <!-- Utolsó oldal, ha nem ott áll, egyébként disabled -->
        <li class="page-item"><a class="page-link @if($page >= $size) disabled @else cursor-pointer @endif" hx-get="{{ route('browsing.load', $size) }}">Legutolsó</a></li>
    </ul>
</nav>
