@if(count($books)==0)
    <br>
    <p>Nincs ilyen című könyv. Hozzá szeretnél adni egy új könyvet? Akkor kattints <b style="cursor: pointer;"
            hx-post="/book/create-new"
            hx-target="#main"
            hx-vals='{"_token": "{{ csrf_token() }}", "title": "{{ $title }}" }'>ide</b>.</p>
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
                <a  style="cursor: pointer;"
                    hx-post="/book/create-use"
                    hx-target="#main"
                    hx-vals='{"_token": "{{ csrf_token() }}", "book_id": "{{ $book->id }}" }' class="btn btn-primary">Kiválasztás</a>
            </td>
        </tr>
    @endforeach
@endif