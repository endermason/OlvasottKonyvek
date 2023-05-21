@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
