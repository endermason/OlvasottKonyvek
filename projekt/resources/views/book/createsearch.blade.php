@if(count($books)==0)
    <tr>
        <td colspan="4">Nincs ilyen című könyv. Hozzá szeretnél adni egy új könyvet? Akkor kattints <b
                class="cursor-pointer" style="padding: 0;"
                hx-post="/book/create-new"
                hx-target="#main"
                hx-vals='{"_token": "{{ csrf_token() }}", "title": "{{ $title }}" }'>ide</b>.
        </td>
    </tr>
@else
    <thead>
    <tr>
        <th>Író</th>
        <th>Cím</th>
        <th>Kiadás éve</th>
        <th></th>
    </tr>
    </thead>

    @foreach($books as $book)
        <tr>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->year }}</td>
            <td>
                <a hx-post="/book/create-use"
                   hx-target="#main"
                   hx-vals='{"_token": "{{ csrf_token() }}", "book_id": "{{ $book->id }}" }' class="btn btn-primary cursor-pointer">Kiválasztás</a>
            </td>
        </tr>
    @endforeach

    <tr>
        <td colspan="4">Hozzá szeretnél adni egy új könyvet? Akkor kattints <b
                class="cursor-pointer"
                hx-post="/book/create-new"
                hx-target="#main"
                hx-vals='{"_token": "{{ csrf_token() }}", "title": "{{ $title }}" }'>ide</b>.
        </td>
    </tr>
@endif
